[![Review Assignment Due Date](https://classroom.github.com/assets/deadline-readme-button-24ddc0f5d75046c5622901739e7c5dd533143b0c8e959d652212380cedb1ea36.svg)](https://classroom.github.com/a/aMYFqSAE)
# CGIS - Proyecto evaluación continua

## EmbrioApp: Una aplicación de apoyo a futuros padres.

María González Genil
 
## ÍNDICE

* Usuarios del sistema	
* Dominio del problema.	
* Objetivos	
* Requisitos de información	
* Requisitos funcionales	
    * Usuario: Administrativo	
    * Usuario: Paciente	
    * Usuario: Ginecólogo	
* Requisitos no funcionales	
* Modelado conceptual UML	

 
### Usuarios del sistema 

- Administrativos - pueden acceder al sistema y crear nuevos ginecólogos e introducir infomación sobre los donantes disponibles. 
- Pacientes – pueden acceder al sistema y ver consejos según su fase de la inseminación o del embarazo. Pueden ver sus tratamientos recetados y sus predicciones de ciclo menstrual (fecha del periodo y periodo fértil).
- Ginecólogos - pueden acceder al sistema y crear nuevos pacientes. Puede clasificar a los pacientes según su estado:
    - Pacientes que necesitan gameto masculino
    - Pacientes que necesitan gameto femenino
    - Pacientes que necesitan ambos gametos
    Además, pueden concretar citas con los pacientes. 

### Dominio del problema.

La fertilidad y la reproducción asistida han ganado un interés significativo por el aumento de problemas de fertilidad y los avances tecnológicos, que revolucionan los tratamientos disponibles. Los problemas de fertilidad afectan a una proporción significativa de la población mundial, con repercusiones emocionales, físicas y sociales para quienes la experimentan. 

La gestión efectiva de la fertilidad no solo implica la aplicación de tratamientos médicos avanzados, sino también la coordinación y el seguimiento de múltiples aspectos del proceso. Desde la programación de citas médicas hasta el seguimiento de donantes, tratamientos y seguimiento de las actividades de este proceso asistencial.

### Objetivos

0BJ-1. Acceso y gestión de perfiles:
- Permitir a los administrativos acceder al sistema para ver y gestionar perfiles de ginecólogos y pacientes registrados.
- Facilitar a los administrativos el registro en el sistema, garantizando un acceso posterior eficiente.

OBJ-2. Gestión de información de usuarios:
- Proporcionar a los administrativos la capacidad de eliminar su propio perfil y gestionar perfiles de ginecólogos.
- Facilitar a los pacientes el acceso a su perfil, así como la capacidad de modificar información básica.

OBJ-3. Gestión de donantes:
- Tener un registro de donantes y algunas de sus cualidades importantes para la selección de gametos en el proceso de inseminación.

OBJ-4. Gestión de citas:
- Permitir a los pacientes visualizar citas con sus ginecólogos.
- Facilitar a los ginecólogos la gestión de citas con pacientes, así como la visualización y modificación de las citas programadas.

OBJ-5. Gestión de Expediente Médico: 
- Permitir a los ginecólogos visualizar, gestionar y eliminar expedientes médicas asociados a sus pacientes, que incluye un registro de las citas, donantes y medicamentos. 
- Proporcionar a los ginecólogos una lista de medicamentos disponibles para prescripción, así como la capacidad de crear nuevas recetas y agregar medicamentos a ellas.

OBJ-6. Gestión de Informes de Inseminación. 
- Permitir a los ginecólogos almacenar la información relativa a un proceso de inseminación de un paciente en expedientes. Debe incluir información sobre las citas que hubieron en ese proceso y los donantes vinculados. 

OBJ-7. Análisis y Estadísticas:
- Proporcionar a los ginecólogos estadísticas sobre el desempeño de los tratamientos, incluyendo el éxito de embarazos naturales e inseminaciones artificiales, así como el tiempo promedio hasta la fecundación exitosa.


### Requisitos de información

RI-001. Pacientes
- El sistema deberá permitir almacenar la siguiente información sobre los pacientes: nombre, email, contraseña y estado (en búsqueda de embarazo natural, en tratamiento para inseminación artificial, embarazada).
- Además, los pacientes podrán acceder al sistema para ver consejos según su fase de la inseminación o del embarazo, así como ver sus tratamientos recetados y sus predicciones de ciclo menstrual (fecha del periodo y periodo fértil).

RI-002. Ginecólogos
- El sistema deberá permitir almacenar la siguiente información sobre los ginecólogos: nombre, email, contraseña, número de colegiado y pacientes asociadas.
- Los ginecólogos podrán acceder al sistema para crear nuevos pacientes y clasificarlos según su estado (En búsqueda de embarazo natural, En tratamiento para inseminación artificial, Embarazada), así como concretar citas con los pacientes.

RI-003. Medicamentos
- El sistema deberá permitir almacenar la siguiente información sobre los medicamentos: nombre y dosis.

RI-004. Donantes
- El sistema deberá permitir almacenar la siguiente información sobre los donantes de gametos: sexo, aptitud (APTO o NO APTO), estado de salud, fecha de nacimiento y fecha de donación, número de hijos. 
- Los administrativos podrán acceder al sistema para registrar nuevos donantes con las características necesarias (sexo, fecha de nacimiento, fecha de donación y número de hijos). 

RI-005. Citas
- El sistema deberá permitir almacenar la siguiente información sobre las citas concretadas: fecha, paciente, ginecólogo, tipo.
- Los tipos de citas serán:
    - Cita de pre-evaluación
    - Cita de tratamiento/inseminación
    - Cita de seguimiento de implantación/embarazo
 
RI-006. Expediente
- El sistema deberá permitir almacenar la siguiente información sobre los expedientes: citas, donantes y recetas asociadas. 
- Se debe generar un nuevo expediente en el momento en el que el paciente acude a su cita de pre-evaluación y este se cerrará en el momento en el que el paciente acuda a su cita de seguimiento de embarazo o 9 meses después de su cita de pre-evaluación siempre y cuando no haya citas posteriores de ningún tipo. 

### Requisitos funcionales

#### Usuario: Administrativo

RF-1.1 - Como administrativo, quiero poder acceder al sistema para ver mi perfil, los ginecólogos y pacientes registrados. 

RF-1.2 - Como administrativo, quiero poder registrarme en el sistema para poder acceder posteriormente a él (nombre, email, contraseña y número de identificación).

RF-1.3 - Como administrativo, quiero poder eliminar mi perfil.

RF-1.4 - Como administrativo, quiero poder crear nuevos ginecólogos en el sistema (nombre, email, contraseña y número de colegiado).

RF-1.5 - Como administrativo, quiero poder registrar nuevos donantes.

#### Usuario: Paciente

RF-2.1 - Como paciente, quiero poder acceder al sistema con nombre de usuario y contraseña.

RF-2.2 - Como paciente, quiero poder ver mi perfil y mi ginecólogo asociado. 

RF-2.3 - Como paciente, quiero poder modificar alguna información de mi perfil (nombre y apellidos).

RF-2.4 - Como paciente, quiero poder ver en una sección con una lista de mis medicamentos prescritos, incluyendo su nombre, dosis y la fecha de prescripción.

RF-2.5 - Como paciente, quiero poder ver mi ciclo menstrual (predicción menstruación y periodo fértil).

RF-2.6 - Como paciente, quiero poder ver las fechas de citas concertadas con el ginecólogo (fecha y hora, ginecólogo y tipo de cita)

#### Usuario: Ginecólogo

RF-3.1 - Como ginecólogo, quiero poder acceder al sistema con nombre de usuario y contraseña.

RF-3.2 - Como ginecólogo quiero ver mi perfil y mis pacientes registradas.

RF-3.3 - Como ginecólogo, quiero poder modificar alguna información de mi perfil (nombre y apellidos).

RF-3.4 - Como ginecólogo, quiero poder ver una sección con una lista de medicamentos (nombres) para prescribirlos a pacientes.

RF-3.5 - Como ginecólogo quiero poder establecer y modificar el estado de mis pacientes (En búsqueda de embarazo o Embarazada).

RF-3.5 - Como ginecólogo, quiero poder visualizar una lista de donantes de gametos y modificar algunos de sus datos (Aptitud).

RF- 3.6 - Como ginecólogo, quiero poder concertar citas con pacientes, especificando fecha y hora.

RF- 3.7 - Como ginecólogo, quiero poder visualizar los expedientes de mis pacientes y modificar alguno de sus datos (concertar citas, incluir prescripción de medicamentos).

RF- 3.10 - Como ginecólogo, quiero poder ver las citas concertadas (paciente, fecha y hora) y poder modificarla. 

RF- 3.11 - Como ginecólogo, quiero poder ver estadísticas sobre el desempeño de los tratamientos y seguimientos: 
- Número de pacientes con embarazo exitoso.
- Tiempo promedio desde inicio de tratamiento hasta fecundación exitosa. 

### Requisitos no funcionales

RN-1 – Una paciente puede ver los medicamentos prescritos, pero no puede modificarlos.

RN-2 – Un expediente no puede tener dos medicamentos iguales prescritos.

RN-3 - Las citas médicas deben ser programadas con al menos 24 horas de antelación.

RN-4 - Las citas médicas de tipo pre-evaluación solo pueden ser concertadas si no ha habido otra cita anteriormente dentro del mismo expediente.

RN-5 - Un expediente se generará de forma automática cuando el paciente asista a su cita de pre-evaluación. 

RN-6 - Las citas médicas de tipo inseminación solo pueden ser concertadas si ya ha pasado la cita tipo pre-evaluación dentro del mismo expediente.

RN-7 - Las citas de tipo seguimiento de embarazo solo pueden ser concertadas si ya ha tenido una cita de tipo inseminación dentro del mismo expediente. 

RN-8 - Ningún usuario puede ser registrado sin nombre usuario, contraseña ni número de colegiado, número de identificación o nuhsa.

RN-9 - Cuando el ginecólogo termine un proceso de inseminación se debe generar un informe o expediente del mismo de forma automática, que incluya información sobre número de citas y duración del expediente.

RN-11 - Si pasan más de 9 meses desde la cita de pre-evaluación, se tomar el proceso como terminado y se debe generar un informe o expediente de forma automática.

RN-11 - Un donante no puede ser asociado a una paciente para inseminación si su aptitud es No Apto.

RN-12- Un donante no puede ser de tipo Apto si tiene más de seis hijos.

RN-13 - Un donante no puede ser de tipo Apto si su última donación de gametos fue hace más de 4 años. 

RN-14 - Un donante no puede ser de tipo Apto si su edad es superior de 35 años si su sexo es femenino. 

RN-15 - Un donante no puede ser de tipo Apto si su edad es superior de 50 años si su sexo es masculino. 


### Modelado conceptual UML

![Diagrama UML](images/UML_V4.jpg)

