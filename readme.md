**Description:**

We have a list of fields in JSON file, and we want to create a dynamic HTML form
based on the data from JSON. Each field has to define a permission level associated
with it for viewing and editing.
So, if the current logged in user has those capabilities in their role, they can access
that particular field.


Fields can be of the following type:
1. text
2. textarea
3. password
4. select
5. radio
6. checkbox1.

Please structure the JSON schema, so that it allows for field_name, field_id,
field_read_permission, field_write_permission, default_value, options.2. We need to
create a generic Form Generator class in core PHP, which will read the JSON and
print out the form in HTML.3. Finally, use that class and a test schema to create a
secure contact form based on AJAX. With all client and server validations. The form
will then email to xxxxx@xxxxxxx.com in HTML format.

Whole script wrote in Core Php.

**Installation**:

- clone the project or download the .zip
- composer install
- start php shell server php -S 127.0.0.1:8006

**UI Improvements**:

- Include theme to render form
- show form data on the left panel on typing

**Note: In order to make css and js load I changed shell server command to from this php -S 127.0.0.1:8006 index.php to this php -S 127.0.0.1:8006**


