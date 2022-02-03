import express from 'express';
import * as dotenv from 'dotenv';
import { connectToDb } from './db/database';
import { errorHandler, notFound } from './middlewares/errorMiddlewares';
import { MetadataAlreadyExistsError } from 'typeorm';
const cookieParser = require('cookie-parser');

dotenv.config();

const postRoutes = require('./routes/post.ts');
const postComments = require('./routes/postComments');
const commentRoutes = require('./routes/comments');
const userRoutes = require('./routes/user');
const authRoutes = require('./routes/auth');

connectToDb().then(client => {
	console.log(`connected to db ${client.options.database}`);

	const app = express();

	app.use(express.json());
	app.use(cookieParser(process.env.COOKIE_SECRET));

	app.use('/api/auth', authRoutes);
	app.use('/api/posts', postRoutes);
	app.use('/api/users', userRoutes);
	app.use('/api/posts/:postId/comments', postComments);
	app.use('/api/comments', commentRoutes);

	app.use(notFound);
	app.use(errorHandler);

	const PORT = process.env.PORT || 3000;
	app.listen(PORT, () => {
		console.log('server running on ' + PORT);
	});
});
