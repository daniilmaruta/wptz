# wptz

Add the following post types from code:

* Event. Should be publicly available.

* Event day. Should only be available for management. Add references between post types using Posts 2 Posts plugin. The event must reference multiple days, but the day must reference only a single event.

Add the following fields to the event day (using ACF or any other plugin that allows export to code):

* Cover photo.

* Date

Add custom template for the event post type that lists all the referenced days with the following fields:

* Title as H3.

* Cover photo as an image.

* Date formatted to 2019-01-23