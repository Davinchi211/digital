CREATE VIEW reporte_asistencia AS
SELECT co.id_curso, co.nombre_curso, al.id_alumno, al.nombre, al.apellido, al.estado_asistencia, si.fecha_asistencia
FROM curso co
INNER JOIN alumno al ON al.id_curso_asignado = co.id_curso
INNER JOIN asistencia si ON si.id_alumno = al.id_alumno;