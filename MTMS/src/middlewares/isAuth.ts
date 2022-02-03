import { NextFunction, Request, Response } from 'express';
import { getRepository } from 'typeorm';
import { User } from '../entities/User.entity';
import { asyncHandler } from './asyncHandler';
const jwt = require('jsonwebtoken');

interface MiddlewareOptions {
	ignoreExpiredTokens: boolean;
}

const defaultOptions: MiddlewareOptions = {
	ignoreExpiredTokens: false,
};

export default function isAuth(options?: MiddlewareOptions) {
	const { ignoreExpiredTokens } = options ?? defaultOptions;
	return asyncHandler(async function (req: Request, res: Response, next: NextFunction) {
		if (req.headers.authorization && req.headers.authorization.startsWith('Bearer')) {
			try {
				const token = req.headers.authorization.split(' ')[1];
				const decoded = jwt.verify(token, process.env.AUTH_TOKEN_SECRET as string, {
					ignoreExpiration: ignoreExpiredTokens,
				});

				let user = await getRepository(User).findOne({ where: { id: decoded.id }, withDeleted: true });
				if (!user) {
					res.status(404);
					throw new Error('Bad credentials');
				}
				//@ts-ignore
				req.user = user;
				return next();
			} catch (e) {
				res.status(401);
				throw new Error('Not authorized, invald token');
			}
		} else {
			res.status(401);
			throw new Error('Not authorized');
		}
	});
}
