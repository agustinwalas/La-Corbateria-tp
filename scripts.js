
const materias = {
        matematica: ["carlos","juan","marco"],
        lengua: ["matias","Cofla","polo"],
        lechinngua: ["matias","Cofla","polo"],
    }

    
const Inscribir = (alumno, materia) =>{
    alumnos = materias[materia];
    if (alumnos < 3) {
        document.write("no podes inscribirte")
    } else {
        materias[materia].push(alumno);
        document.write(materias[materia])
    }
}

Inscribir("carlos","matematica");