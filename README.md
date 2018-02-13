# EEL Helper to estimate reading time of a document

This package calculate a estimated reading time for the given document.

Installation
------------

    composer require ttree/eel-estimatedreadingtime

Usage
-----

The package provide a service an EEL Helper and a Fusion prototype.

You can use the EEL Helper, if you have the content string in variable `content`, like this:

    ${EstimatedReadingTime.get(content)}
    
The method `get` accept an addtionnal parmater, the reading speed, expresed in words per minute. 
By default this value is 200. You can change the value in your `Settings.yaml` or in the expression:

	${EstimatedReadingTime.get(content, 240)}
    
The Fusion prototype use the ContentCollection prototype provided by Neos, to render the content at the given path:

	prototype(You.Site:ReadingTimeLabel) < prototype(Neos.Fusion:Value)
		readingTime = Ttree.Eel.EstimatedReadingTime:Get {
			nodePath = 'main'
		}
		value = ${'Read the article (' + this.readingTime + ' min.)'}
	}
	
For a correct estimate, the document node must be available in the `node` context variable.

Acknowledgments
---------------

Development sponsored by [ttree ltd - neos solution provider](http://ttree.ch).

We try our best to craft this package with a lots of love, we are open to
sponsoring, support request, ... just contact us.

License
-------

Licensed under MIT, see [LICENSE](LICENSE)
