<h1 align="center">📌 Proyecto Soporte Cifra</h1>

<p align="center">
  Sistema de gestión de solicitudes desarrollado en PHP/Laravel con base de datos MySQL.  
</p>

<hr>

<h2>🚀 Requisitos Previos</h2>
<ul>
  <li>PHP 8.x o superior</li>
  <li>Composer</li>
  <li>MySQL 5.7 o superior</li>
  <li>Git</li>
</ul>

<hr>
<h2>📦 Dependencias principales</h2>
<ul>
  <li><strong>Laravel Framework</strong> - Versión 10.x</li>
  <li><strong>Laravel Sanctum</strong> - Autenticación basada en tokens</li>
  <li><strong>MySQL</strong> - Base de datos relacional</li>
  <li><strong>Composer</strong> - Gestión de dependencias</li>
</ul>
<hr>


<h2>📥 Instalación</h2>

<ol>
  <li><strong>Clonar el repositorio</strong></li>
  <pre><code>git clone https://github.com/usuario/soporte-cifra.git
cd soporte-cifra</code></pre>

  <li><strong>Instalar dependencias</strong></li>
  <pre><code>composer install</code></pre>

  <li><strong>Configurar el archivo <code>.env</code></strong></li>
  <p>Modifica las credenciales según tu entorno:</p>
  <pre><code>DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=soporte_cifra
DB_USERNAME=root
DB_PASSWORD=
</code></pre>

  <p>Si es necesario, crea la base de datos manualmente:</p>
  <pre><code>CREATE DATABASE soporte_cifra;</code></pre>

  <li><strong>Generar la clave de la aplicación</strong></li>
  <pre><code>php artisan key:generate</code></pre>

  <li><strong>Ejecutar migraciones con datos de prueba</strong></li>
  <p>Este comando creará las tablas y agregará datos iniciales:</p>
  <pre><code>php artisan migrate:fresh --seed</code></pre>
</ol>

<hr>

<h2>▶️ Ejecución del Proyecto</h2>
<pre><code>php artisan serve</code></pre>
<p>Por defecto se ejecutará en: <a href="http://127.0.0.1:8000" target="_blank">http://127.0.0.1:8000</a></p>

<hr>

<h2>🔑 Credenciales de Prueba</h2>
<table>
  <tr>
    <th>Rol</th>
    <th>Usuario</th>
    <th>Contraseña</th>
  </tr>
  <tr>
    <td>Usuario</td>
    <td>juan.perez@example.com</td>
    <td>Password</td>
  </tr>
  <tr>
    <td>Admin</td>
    <td>admin@example.com</td>
    <td>Password</td>
  </tr>
  <tr>
    <td>Técnico</td>
    <td>ana.ramirez@example.com</td>
    <td>Password</td>
  </tr>
</table>

<hr>

<h2>📌 Notas</h2>
<ul>
  <li>Si cambias las credenciales de la base de datos, actualiza el archivo <code>.env</code>.</li>
  <li>Este proyecto incluye datos de prueba mediante el <code>DatabaseSeeder</code>.</li>
  <li>Compatible con entornos locales y de producción.</li>
</ul>
