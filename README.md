# CodeIgniter on OpenShift #

The easiest way to install this application is to use the [OpenShift Instant Application](https://openshift.redhat.com/app/console/application_type/quickstart!14232). 
If you'd like to install it manually, follow [these directions](#manual-installation).

## OpenShift Considerations ##
These are some special considerations you may need to keep in mind when
running your application on OpenShift.

### Database ###
By default, your application is configured to use a MySQL database on OpenShift.

### Handling Multiple Environments ###
By default, CodeIgniter on OpenShift comes with the `ENVIRONMENT` constant set to
'production'. At the top of php/index.php, you will see: 

```
define('ENVIRONMENT', 'production');
```

In production mode, your application will:

* Disable all error output (for security reasons)

When you develop your CodeIgniter application locally, you can change the
environment by setting the `ENVIRONMENT` variable in php/index.php to 
'development':

```
define('ENVIRONMENT', 'development');
```

If you do so, CodeIgniter will run your application under 'development' mode.
In development mode, your application will:

* Show more detailed errors in browser
* Load development-specific configuration files

We strong advise you to not run your application in this mode in production.

Visit the [CodeIgniter User Guide](http://www.codeigniter.com/user_guide/index.html) 
for more details on using [multiple CodeIgniter development environments](http://www.codeigniter.com/user_guide/general/environments.html).

##### Modified Configuration Settings #####

<table>
  <tr>
    <th>File</th>
    <th>Config Setting</th>
    <th>Value</th>
  </tr>
  <tr>
    <td>php/index.php</td>
    <td>ENVIRONMENT</td>
    <td>production</td>
  </tr>
  <tr>
    <td>php/application/config/config.php</td> 
    <td>
        log_path<br>
        cache_path<br>
        encryption_key<br>
        proxy_ips
    </td>
    <td>
        $_ENV['OPENSHIFT_LOG_DIR']<br>
        $_ENV['OPENSHIFT_TMP_DIR']<br>
        $_ENV['OPENSHIFT_SECRET_TOKEN']<br>
        $_ENV['OPENSHIFT_HAPROXY_IP']
    </td>
  </tr>
  <tr>
    <td>php/application/config/database.php</td>
    <td>
        hostname<br>
        port<br>
        username<br>
        password<br>
        database
    </td>
    <td>
        $_ENV['OPENSHIFT_MYSQL_DB_HOST']<br>
        $_ENV['OPENSHIFT_MYSQL_DB_PORT']<br>
        $_ENV['OPENSHIFT_MYSQL_DB_USERNAME']<br>
        $_ENV['OPENSHIFT_MYSQL_DB_PASSWORD']<br>
        $_ENV['OPENSHIFT_APP_NAME']
    </td>
  </tr>
</table>

## Manual Installation ##

1. Create an account at https://www.openshift.com/

1. Create a PHP/MySQL application

    ```
    rhc app create codeigniterapp php-5.4 mysql-5.5 --from-code=https://github.com/openshift/CodeIgniterQuickStart.git
    ```

    **Note:** This QuickStart was configured for MySQL

1. That's it! Enjoy your new CodeIgniter application!
