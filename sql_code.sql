-- DELETE FROM `blog`.`perfiles` WHERE  `id_per`=11;

-- select * from `perfiles`;
-- select * from `users`;

SELECT nom_per, nom_user, pas_user FROM users INNER JOIN perfiles ON users.id_per = perfiles.id_per;