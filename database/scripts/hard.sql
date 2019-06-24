USE controle_de_tarefas;
-- SELECT DISTINCT t1.nome, t1.class_id FROM 
-- 		(SELECT c.name as nome, c.id as class_id
--          FROM  course_has_class cc, class c, dependence d 
--          WHERE c.id = cc.class_id AND cc.course_id =1
--         ) as t1
-- LEFT  JOIN 
--             (SELECT dd.class_id as c_id
--              FROM dependence dd 
--              WHERE dd.course_id = 1
--             ) as t2 
-- ON t2.c_id = t1.class_id WHERE t2.c_id IS NULL;

SELECT DISTINCT c.name, c.id
FROM class c, dependence d, course_has_class ch
WHERE c.id = d.class_id AND ch.class_id = c.id AND ch.course_id = 1 AND d.class_id_dep IN 
(SELECT s.class_id FROM  student_has_class s WHERE s.student_registration = 123 AND s.status = 2)
;


SELECT s.class_id FROM  student_has_class s WHERE s.student_registration = 123 AND s.status = 2;


