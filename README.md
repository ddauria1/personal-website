<h2>Personal Website with Symfony 4</h2>

<p>First website with Symfony 4</p>

Reviewed the basic usage of:<br>
<ul>
<li>annotations (wildcards, requirements)</li>
<li>custom error pages(visible only on PROD env)</li>
<li>debug</li>
<li>logger</li>
<li>twig (loops, filters)</li>
<li>forms</li>
<li>session</li>
<li>Include PHP package that I built - Charity Widget</li>
</ul>

<p>
To test the custom error pages in your local machine, please update the APP_ENV attribute under .env file to prod.
</p> 


#Dependency
This project requires the following tailored package:

```
composer require ddauria1/charity-package
```
As an example I calling this package in the MainController fuction to display the widget in the homepage.

```
$charity = new Base();
$charity->getDisplay()
```
