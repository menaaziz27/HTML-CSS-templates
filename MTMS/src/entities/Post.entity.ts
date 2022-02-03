import {
	Entity,
	PrimaryGeneratedColumn,
	Column,
	BaseEntity,
	CreateDateColumn,
	UpdateDateColumn,
	ManyToOne,
	JoinColumn,
	OneToMany,
} from 'typeorm';
import { Comment } from './Comment.entity';
import { Like } from './Like.entity';
import { User } from './User.entity';

@Entity()
export class Post extends BaseEntity {
	@PrimaryGeneratedColumn()
	id: number;

	@Column()
	title: string;

	@Column()
	content: string;

	@ManyToOne(() => User, user => user.posts, { onDelete: 'CASCADE' })
	@JoinColumn({ name: 'user_id' })
	user: User;

	@OneToMany(() => Comment, comment => comment.post, { cascade: true })
	comments: Comment[];

	@OneToMany(() => Like, like => like.post, { cascade: true })
	likes: Like[];

	@CreateDateColumn()
	created_at: Date;

	@UpdateDateColumn()
	updated_at: Date;
}
