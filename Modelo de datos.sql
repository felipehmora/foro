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

select 	tbl_temas.tit as tema, 
		tbl_temas.autor_tema as autor_tema, 
		tbl_comentarios.comentario as comentario, 
		tbl_comentarios.autor_comentario as autor_comentario
		from tbl_temas, tbl_comentarios
		where tbl_temas.id = tbl_comentarios.id_tema;

select 	a.tit as tema, 
		a.autor_tema as autor_tema, 
		b.comentario as comentario, 
		b.autor_comentario as autor_comentario
		from tbl_temas as a, tbl_comentarios as b
		where a.id = b.id_tema;
create view VW_foro_resumen1 as 

	select 	a.tit as tema, 
			a.autor_tema as autor_tema, 
			b.comentario as comentario, 
			b.autor_comentario as autor_comentario
			from tbl_temas as a, tbl_comentarios as b
			where a.id = b.id_tema;
select * from VW_foro_resumen1;

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
create view VW_foro_resumen2 as select A.tit as tema,
       A.autor_tema as autor_tema,
       B.comentario as comentario,
       B.autor_comentario as auto_comentario
       from tbl_temas as A
       inner join tbl_comentarios as B
       on A.id = B.id_tema;

select * from VW_foro_resumen2; 
-- left join
	create view VW_foro_resumen3 as
	select A.tit as tema,
	       A.autor_tema as autor_tema,
	       B.comentario as comentario,
	       B.autor_comentario as auto_comentario
	       from tbl_temas as A
	       left join tbl_comentarios as B
	       on A.id = B.id_tem
select * from VW_foro_resumen3;

select tema, count(comentario) as cnt_comentarios from VW_foro_resumen3
	group by tema;

select tema, count(comentario) as cnt_comentarios from VW_foro_resumen3
	group by tema order by cnt_comentarios desc;

