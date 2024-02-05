-- public.roles definition

-- Drop table

-- DROP TABLE roles;

CREATE TABLE roles (
                       "role" varchar NOT NULL,
                       id varchar NOT NULL,
                       CONSTRAINT roles_pk PRIMARY KEY (id)
);


-- public.users definition

-- Drop table

-- DROP TABLE users;

CREATE TABLE users (
                       "name" varchar(100) NOT NULL,
                       email varchar(255) NOT NULL,
                       "password" varchar(255) NOT NULL,
                       id varchar NOT NULL,
                       cookie varchar NULL,
                       cookie_expiration_date timestamp NULL,
                       CONSTRAINT users_pk PRIMARY KEY (id)
);


-- public.post_titles definition

-- Drop table

-- DROP TABLE post_titles;

CREATE TABLE post_titles (
                             topic varchar NOT NULL,
                             id varchar NOT NULL,
                             user_id_fk varchar NOT NULL,
                             CONSTRAINT post_titles_pk PRIMARY KEY (id),
                             CONSTRAINT post_titles_users_id_fk FOREIGN KEY (user_id_fk) REFERENCES users(id)
);


-- public.user_roles definition

-- Drop table

-- DROP TABLE user_roles;

CREATE TABLE user_roles (
                            user_id varchar NOT NULL,
                            role_id varchar NOT NULL,
                            id varchar NOT NULL,
                            CONSTRAINT user_roles_pk PRIMARY KEY (id),
                            CONSTRAINT user_roles_roles_id_fk FOREIGN KEY (role_id) REFERENCES roles(id),
                            CONSTRAINT user_roles_users_id_fk FOREIGN KEY (user_id) REFERENCES users(id)
);


-- public.post_contents definition

-- Drop table

-- DROP TABLE post_contents;

CREATE TABLE post_contents (
                               image_path varchar NULL,
                               id varchar NOT NULL,
                               "content" varchar NOT NULL,
                               post_title_id_fk varchar NOT NULL,
                               CONSTRAINT post_contents_pk PRIMARY KEY (id),
                               CONSTRAINT post_contents_post_titles_id_fk FOREIGN KEY (post_title_id_fk) REFERENCES post_titles(id)
);

INSERT INTO roles ("role", id) VALUES ('A', '1');
INSERT INTO roles ("role", id) VALUES ('M', '2');
INSERT INTO roles ("role", id) VALUES ('U', '3');

INSERT INTO users ("name", email, "password", id, cookie, cookie_expiration_date)
VALUES ('Tomasz Olkuski', 'tomasz.olkuski@student.pk.edu.pl', 'haslo', 'uuid', NULL, NULL);

INSERT INTO users ("name", email, "password", id, cookie, cookie_expiration_date)
VALUES ('Jan Kowalski', 'jan.kowalski@student.pk.edu.pl', 'hasuo', '2', NULL, NULL);

INSERT INTO post_titles (topic, id, user_id_fk)
VALUES ('Traveling in Europe', '1', '1');

INSERT INTO post_titles (topic, id, user_id_fk)
VALUES ('Exploring Asia', '2', '2');

INSERT INTO user_roles (user_id, role_id, id) VALUES ('1', '1', '1');
INSERT INTO user_roles (user_id, role_id, id) VALUES ('2', '3', '2');

INSERT INTO post_contents (image_path, id, "content", post_title_id_fk)
VALUES ('/images/travel_europe.jpg', '1', 'I had an amazing time traveling in Europe!', '1');

INSERT INTO post_contents (image_path, id, "content", post_title_id_fk)
VALUES ('/images/explore_asia.jpg', '2', 'My adventures in Asia were unforgettable!', '2');
