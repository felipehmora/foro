create database bdphp2_20210607;

use bdphp2_20210607;

create table tbl_temas(
	id integer auto_increment,
	tit text,
	autor_tema varchar(30),
	fecha date,
	hora time,
	primary key(id)
);

create table tbl_comentarios(
	id integer auto_increment,
	comentario text,
	autor_comentario varchar(30),
	fecha date,
	hora time,
	id_tema integer,
	primary key(id)
);

select tbl_temas.tit as tema,
       tbl_temas.autor_tema as autor_tema,
       tbl_comentarios.comentario as comentario,
       tbl_comentarios.autor_comentario as auto_comentario
       from tbl_temas, tbl_comentarios
       where tbl_temas.id = tbl_comentarios.id_tema;

select A.tit as tema,
       A.autor_tema as autor_tema,
       B.comentario as comentario,
       B.autor_comentario as auto_comentario
       from tbl_temas as A, tbl_comentarios as B
       where A.id = B.id_tema;

create view vw_foro_resumen1 as
	select A.tit as tema,
       A.autor_tema as autor_tema,
       B.comentario as comentario,
       B.autor_comentario as auto_comentario
       from tbl_temas as A, tbl_comentarios as B
       where A.id = B.id_tema;

select * from vw_foro_resumen1;

-- inner join

SELECT column_name(s)
FROM table1
INNER JOIN table2
ON table1.column_name = table2.column_name;

select A.tit as tema,
       A.autor_tema as autor_tema,
       B.comentario as comentario,
       B.autor_comentario as auto_comentario
       from tbl_temas as A
       inner join tbl_comentarios as B
       on A.id = B.id_tema;

create view vw_foro_resumen2 as
	select A.tit as tema,
       A.autor_tema as autor_tema,
       B.comentario as comentario,
       B.autor_comentario as auto_comentario
       from tbl_temas as A
       inner join tbl_comentarios as B
       on A.id = B.id_tema;

select * from vw_foro_resumen2;

-- left join

SELECT column_name(s)
FROM table1
LEFT JOIN table2
ON table1.column_name = table2.column_name;

select A.tit as tema,
       A.autor_tema as autor_tema,
       B.comentario as comentario,
       B.autor_comentario as auto_comentario
       from tbl_temas as A
       left join tbl_comentarios as B
       on A.id = B.id_tema;

create view vw_foro_resumen3 as
select A.tit as tema,
       A.autor_tema as autor_tema,
       B.comentario as comentario,
       B.autor_comentario as auto_comentario
       from tbl_temas as A
       left join tbl_comentarios as B
       on A.id = B.id_tema;

select * from vw_foro_resumen3;

select tema from vw_foro_resumen3
	   group by tema;

select tema, count(comentario) as cnt_comentarios from vw_foro_resumen3
	   group by tema;

select tema, count(comentario) as cnt_comentarios from vw_foro_resumen3
	   group by tema order by cnt_comentarios desc;