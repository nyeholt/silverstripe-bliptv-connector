# BlipTV Connector  Module

A simple readonly module for retrieving data from BlipTV

## Maintainer Contact

Marcus Nyeholt

<marcus (at) silverstripe (dot) com (dot) au>

## Requirements

SilverStripe 2.4.x
External Content module

## Documentation

Install the module and dependencies

In your theme's editor.css file (that gets hooked into the TinyMCE editor) add
the following classes

.blip480 {}
.blip600 {}

Include the bliptv-connector/javascript/bliptv.js file to your theme (either 
via Page.php or <% require %> in the head of your Page.ss. This relies on
jQuery, so that will need to be present too. 

Create a BlipTV Connector in the External Content section of your CMS. 

Edit some page content, and create a normal link. Make the target of the link
an External Content item, and select a video pulled through the BlipTV 
connector created earlier. 

Highlight the link, and select either the blip480 class, or blip600 class from
the styles dropdown. This link will now be dynamically replaced by that
javascript with the video player. 

Quick Usage Overview
-----------------------------------------------

As copied from http://doc.silverstripe.org/doku.php?id=module:external-content-quickstart

This article assumes that you have installed the "FileSystem Connector" module (http://public.silverstripe.com.au/open/modules/filesystem-connector/), which provides access to content from a filesystem path. 

==== Connecting to the content source ====
  * Extract the module to your silverstripe root directory in a directory called "external-content" 
  * Browse to http://localhost/external-content/admin and login
  * Create a new FileSystemContentSource from the tree on the left menu. Set the 
following field values:
  ** name - File System Content
  ** Folder Path - The folder to retrieve content from (in the form /path/to/content)
  * Once saved, you will need to reload the External Content page for content to 
start coming through the connector

==== Accessing content on the frontend ====

  * Navigate to the "Site Content" tab
  * Create a new 'External Content Page' in your site tree
  * Change the External Content Source value to the source created earlier
  * Save and view the page on the frontend; its url should look something like http://localhost/extcon/view?ID=1 or similar
  * You can also link to external content directly in the WYSIWYG content areas by selecting "External Content" as the "Link To" option when the Insert Link toolbar is displayed

==== Importing content ==== 

  * First, make sure you have an empty folder called "Incoming" created in the "Files & Images" section
  * Navigate back to the External Content section, and expand the "File System Content" node created earlier. 
  * Navigate to a folder that contains some files and click on its name, then click on the Migrate tab.
  * Select the "Incoming" folder, then click the "Include Selected Item in Migration" option.
  * Click the Migrate button down the bottom. An alert box will shortly appear when the migrate is complete. 
  * Navigate to the "Files and Images" section and click the "Incoming" folder. 
  * The uploaded files should appear in the right hand listing when you select the imported folder

API
-----------------------------------------------

For information on the various parts of the API needed for writing connectors, 
please see the new connector tutorial at 

http://doc.silverstripe.org/doku.php?id=module:external-content-newconnector

WebApiClient

A generic method for calling methods with parameters where the 
method is actually found on a remote URL, and the return type of that method
call can be easily converted to an appropriate object. For example, imagine that
there is a "login" method that can be called on a particular URL with some 
parameters, with an XML return type. A definition of this method would look like

	'login' => array(
		'url' => '/api/login',
		'return' => 'xml',
		'params' => array('u', 'pw'),
		'cache' => false,
	),

When the WebApiClient is created, it is passed a 'baseUrl' and a list of method
definitions like the above. Then, it is simply a matter of calling

	$apiClient->call('login', array('u' => 'user', 'pw' => 'pass'))

and getting a SimpleXML object as the return type. This mechanism is used by
the AlfrescoSeaMistRepository, so refer to that module for further details. 


Troubleshooting
-----------------------------------------------

If you're having trouble viewing pages when opening an ExternalContentPage
directly via the backend, make sure there's not two ? characters in the URL. The
SS backend assumes that a URL for an item won't have a URL in it, but at the 
moment URLs are constructed in this way. 
