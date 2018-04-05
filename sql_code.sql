-- DELETE FROM `blog`.`perfiles` WHERE  `id_per`=11;

-- select * from `perfiles`;
-- select * from `users`;
-- SELECT nom_per, nom_user, pas_user FROM users INNER JOIN perfiles ON users.id_per = perfiles.id_per;
-- SELECT * FROM perfiles WHERE id_per = 6
-- update `perfiles`, `users` set nom_user = 'aguilar123', nom_per = 'kassanda' where id_user = 8
-- describe `secciones`

SELECT count(*) FROM comentarios WHERE id_Sec = 6