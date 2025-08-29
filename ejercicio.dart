import 'dart:io';

// Lista global para almacenar los datos de los alumnos
List<Map<String, dynamic>> alumnos = [];

void main() {
  mostrarMenuPrincipal();
}

void mostrarMenuPrincipal() {
  int opcion = -1;

  while (opcion != 0) {
    print("\n=== MENU PRINCIPAL ===");
    print("1) Ingresar datos");
    print("2) Reporte de alumnos");
    print("3) Promedio general");
    print("0) Salir");
    stdout.write("Seleccione una opción: ");

    try {
      opcion = int.parse(stdin.readLineSync().toString());

      switch (opcion) {
        case 1:
          ingresarDatos();
          break;
        case 2:
          reporteAlumnos();
          break;
        case 3:
          promedioGeneral();
          break;
        case 0:
          print("Saliendo del programa...");
          break;
        default:
          print("Opción no válida");
      }
    } catch (e) {
      print("Por favor ingrese un número válido");
    }
  }
}

void ingresarDatos() {
  print("\n=== INGRESAR DATOS ===");
  String respuesta = "S";

  while (respuesta.toUpperCase() == "S") {
    String nombre;
    double promedio;

    // Ingresar nombre del alumno
    stdout.write("Ingresar el nombre del alumno: ");
    nombre = stdin.readLineSync().toString();

    // Ingresar promedio
    stdout.write("Ingresar el promedio: ");
    try {
      promedio = double.parse(stdin.readLineSync().toString());
    } catch (e) {
      print("Promedio inválido, se asignará 0.0");
      promedio = 0.0;
    }

    // Guardar los datos del alumno
    Map<String, dynamic> alumno = {'nombre': nombre, 'promedio': promedio};
    alumnos.add(alumno);

    print("Alumno agregado exitosamente");

    // Preguntar si desea agregar otro alumno
    stdout.write("¿Desea agregar otro alumno? (S/N): ");
    respuesta = stdin.readLineSync().toString();
  }
}

void reporteAlumnos() {
  print("\n=== REPORTE ===");

  if (alumnos.isEmpty) {
    print("No hay alumnos registrados");
    return;
  }

  for (var alumno in alumnos) {
    String nombre = alumno['nombre'];
    double promedio = alumno['promedio'];
    String condicion = promedio >= 13.0 ? "aprobado" : "desaprobado";

    print("Alumno: $nombre");
    print("Promedio: ${promedio.toStringAsFixed(2)}");
    print("Condición: $condicion");
    print("-" * 30);
  }
}

void promedioGeneral() {
  print("\n=== PROMEDIO ===");

  if (alumnos.isEmpty) {
    print("No hay alumnos registrados para calcular el promedio");
    return;
  }

  double sumaPromedios = 0.0;

  for (var alumno in alumnos) {
    sumaPromedios += alumno['promedio'];
  }

  double promedioGeneralCalculado = sumaPromedios / alumnos.length;

  print(
    "El promedio general de todos los alumnos es: ${promedioGeneralCalculado.toStringAsFixed(2)}",
  );
}
