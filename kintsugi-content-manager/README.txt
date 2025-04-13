=== Kintsugi Content Manager ===
Contributors: ikintsugi
Tags: noticias, contenido, kintsugi, articulos, videos
Requires at least: 5.0
Tested up to: 6.0
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Plugin para administrar una sección de noticias desde el panel de WordPress.

== Description ==

Kintsugi Content Manager permite administrar fácilmente una sección de noticias en tu sitio web de WordPress. Puedes crear dos tipos de noticias:

1. **Artículos externos**: Requieren título, imagen de portada, descripción corta y link externo.
2. **Videos**: Requieren título, link de YouTube y descripción corta (no se muestra imagen de portada, sino un embed de video).

El contenido se muestra en el frontend mediante dos shortcodes:

* `[administracion_noticias]`: Lista todas las noticias con filtros, paginación y buscador.
* `[administracion_noticias_carrousel count="6"]`: Genera un carousel animado de noticias (máximo 10).

== Installation ==

1. Sube el plugin a tu sitio de WordPress
2. Activa el plugin a través del menú 'Plugins' en WordPress
3. Ve a 'Kintsugi Content' en el menú de administración
4. Añade noticias desde el submenú 'Noticias'
5. Usa los shortcodes en tus páginas o entradas para mostrar las noticias

== Shortcodes ==

**Listado de Noticias**

```
[administracion_noticias]
```

**Carousel de Noticias**

```
[administracion_noticias_carrousel count="6"]
```

Parámetros opcionales para el carousel:
* count: Número de noticias a mostrar (valores permitidos: 4, 5, 6, 8, 10)

== Frequently Asked Questions ==

= ¿Cómo puedo personalizar los estilos? =

Los estilos CSS están definidos en los archivos CSS del plugin. Puedes sobrescribirlos desde tu tema.

= ¿Qué pasa si no tengo imagen destacada para una noticia? =

Para las noticias tipo "Artículo", es recomendable usar una imagen destacada. Para las noticias tipo "Video", no es necesario, ya que se mostrará el thumbnail del video de YouTube automáticamente.

== Screenshots ==

1. Listado de noticias en el frontend
2. Carousel de noticias
3. Administración desde el panel de WordPress
4. Formulario de creación/edición de noticias

== Changelog ==

= 1.0.0 =
* Versión inicial

== Upgrade Notice ==

= 1.0.0 =
Versión inicial
