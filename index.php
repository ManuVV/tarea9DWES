<!DOCTYPE html>
<html>
<head>
    <!-- Configuración básica del documento -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Buscador de Pokémon</title>
    <!-- Enlace a la hoja de estilos -->
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <!-- Contenedor del título -->
        <div class="titulo">
            <h2>Tarea 9 DWES - Buscador de Pokémon</h2>
        </div>
        
        <!-- Contenedor del formulario de búsqueda -->
        <div class="contenedorFormulario">
            <form method="GET" class="claseFormulario">
                <!-- Campo de entrada para el nombre del Pokémon -->
                <input type="text" name="pokemon" class="claseInput" 
                       placeholder="Introduce nombre o número de pokedex" required>
                <!-- Botón de búsqueda -->
                <button type="submit" class="boton">Buscar</button>
            </form>
        </div>
        <!-- Contenedor de la tabla de resultados -->
        <div class="contenedorTabla">
            <table>
                <!-- Encabezados de la tabla -->
                <tr>
                    <td>Imagen</td>
                    <td>Numero de Pokedex</td>
                    <td>Nombre</td>
                    <td>Tipo(s)</td>
                    <td>Altura</td>
                    <td>Peso</td>
                </tr>
                <!-- Inclusión del archivo de funciones PHP -->
                <?php include 'funciones.php'; ?>
                <!-- Llamada a la función que comprueba y muestra los resultados -->
                <?php echo formularioSubmit(); ?>
            </table>
        </div>
    </div>
    <footer>
        <p>Manuel Vargas Valle © 2025</p>
    </footer>
</body>
</html>