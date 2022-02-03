import {
	Entity,
	PrimaryGeneratedColumn,
	Column,
	BeforeInsert,
	BaseEntity,
	CreateDateColumn,
	UpdateDateColumn,
	BeforeUpdate,
	OneToMany,
	DeleteDateColumn,
} from 'typeorm';
import { Comment } from './Comment.entity';
import { Like } from './Like.entity';
import { Post } from './Post.entity';
const bcrypt = require('bcryptjs');

@Entity()
export class User extends BaseEntity {
	@PrimaryGeneratedColumn()
	id: number;

	@Column()
	name: string;

	@Column({
		unique: true,
	})
	email: string;

	@Column()
	password: string;

	@Column({
		type: 'date',
		nullable: true,
	})
	birth_date: Date;

	@DeleteDateColumn()
	deleted_at: Date;

	@CreateDateColumn()
	created_at: Date;

	@UpdateDateColumn()
	updated_at: Date;

	@OneToMany(() => Post, post => post.user, { cascade: true })
	posts: Post[];

	@OneToMany(() => Comment, comment => comment.user, { cascade: true })
	comments: Comment[];

	@OneToMany(() => Like, like => like.user, { cascade: true })
	likes: Like[];

	@BeforeInsert()
	@BeforeUpdate()
	async hashPassword(): Promise<void> {
		if (this.password) {
			this.password = bcrypt.hashSync(this.password, 10);
		}
	}
}
