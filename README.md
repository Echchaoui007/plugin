Signal WordPress Plugin
This WordPress plugin, named "Signal," allows users to create custom forms to gather information about signals. The plugin includes a shortcode that can be used to display the form on any WordPress page or post. The submitted form data is stored in a database table.

Features
Create custom forms with various input fields
Store submitted form data in a database table
Display the form using a shortcode
Manage form data in the admin dashboard
How it works
The code creates a custom WordPress plugin with the following functionality:

Activation and deactivation hooks: The plugin creates a new table in the WordPress database when activated and drops the table when deactivated.
Admin menu pages: The plugin adds two menu pages in the admin dashboard, one for creating the form and another for displaying the stored form data.
Form creation: The plugin provides an interface in the admin dashboard to create a custom form with various input fields.
Shortcode: The plugin registers a shortcode [form_signal] that can be used to display the created form on any WordPress page or post.
Form submission: The plugin handles form submissions and stores the submitted data in the database table.
Displaying form data: The plugin provides an interface in the admin dashboard to display the stored form data in a table.
Usage
Install and activate the plugin in your WordPress site.
Go to the "Signal" menu page in the admin dashboard to
