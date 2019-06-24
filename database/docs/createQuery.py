file_materia = open("materias.txt", "r")
file_dependencia = open("dependencia.txt", "r")
file_curso_materia = open("cursos_tem_materia.txt", "r")

query_materia = open("queryMateria.txt", "w")
query_dependencia = open("queryDependecia.txt", "w")
query_curso_materia = open("queryCursoMateria.txt", "w")

# for linha in file_materia:
#     row = linha.split(";")
#     if len(row) == 3:
#         escrita = "INSERT INTO class VALUES ('%s','%s','%2d');\n" % (row[0], row[1], int(row[2]))
#         query_materia.write(escrita)



for linha in file_dependencia:
    row = linha.split(";")
    if len(row) == 3:
        escrita = "INSERT INTO dependence VALUES ('%s','%s','%s','%.6s');\n" % (row[1], row[0], row[1], row[2])
        query_dependencia.write(escrita)

# for linha in file_curso_materia:
#     row = linha.split(";")
#     if len(row) == 4:
#         escrita = "INSERT INTO course_has_class VALUES (%s,'%s','%s','%.1s');\n" % (row[1], row[0], row[2], row[3])
#         query_curso_materia.write(escrita)