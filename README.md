## DJ Blaster Info

DJ Blaster is a platform to provide information for DJ's to read while on the air. 


### Technical Details

The bundle was built using Symfony 2.6 with standard Twig templates and the Doctrine ORM. The frontend is built using Angular JS. Twitter Bootstrap is used for the page components and style.


### Dependencies

Two Symfony library bundles are used by DJBlaster:

* [jms/serializer-bundle](http://jmsyst.com/bundles/JMSSerializerBundle)
    * Serializing json responses in the AjaxController for the Angular AJAX calls
* [knplabs/knp-snappy-bundle](https://github.com/KnpLabs/KnpSnappyBundle) 
    * Generating report pdfs using wkhtmltopdf in the AdminReportsController

NOTE: wkhtmltopdf is ridiculously hard to get working on some server configurations.  