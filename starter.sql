CREATE TABLE `users` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL UNIQUE,
  `password` varchar(20) NOT NULL,
    `is_admin` boolean default FALSE
);

CREATE TABLE `events` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `title` text NOT NULL,
  `source` VARCHAR(255) NOT NULL,
  `description` text NOT NULL,
  `location` VARCHAR(255) NOT NULL,
  `date` date NOT NULL,
  `from_time` text NOT NULL,
  `to_time` text NOT NULL,
  `status` int default 0,
  `target` VARCHAR(255) NULL,
  `user_id` INT NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
);


CREATE TABLE `registrations` (
  `id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `event_id` INT NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`event_id`) REFERENCES `events`(`id`) ON DELETE CASCADE,
  UNIQUE KEY `user_event_unique` (`user_id`, `event_id`)
);

CREATE TABLE `feedbacks` (
  `id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `event_id` INT NOT NULL,
`rating` INT CHECK (rating BETWEEN 1 AND 5), 
  `feedback_text` VARCHAR(1000),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`event_id`) REFERENCES `events`(`id`) ON DELETE CASCADE,
  UNIQUE KEY `user_event_unique` (`user_id`, `event_id`)
);