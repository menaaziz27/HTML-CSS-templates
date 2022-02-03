import { createConnection } from 'typeorm';
import { Comment } from '../entities/Comment.entity';
import { Like } from '../entities/Like.entity';
import { Post } from '../entities/Post.entity';
import { User } from '../entities/User.entity';
import * as dotenv from 'dotenv';
dotenv.config();

export const connectToDb = async () => {
	try {
		return await createConnection({
			type: 'postgres',
			host: 'localhost',
			port: 5432,
			username: 'postgres',
			password: 'admin',
			database: 'final',
			entities: [User, Post, Like, Comment],
			synchronize: true,
		});
	} catch (e) {
		console.error(e);
		throw new Error('Unable to connect to db.');
	}
};
