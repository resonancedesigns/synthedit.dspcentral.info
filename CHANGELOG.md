### HEAD

### 0.1.7 (August 14th, 2015)
*   Created "Search" class
*   Created preliminary search views/pages
    TODO: Refine view of search results to reflect same view found on resource views/pages.
*   Added string output messages for instances of empty results and and no URL search parameter/GET request to "Search" functionality
*   Updated search forms in navigation to use "search" input type in place of "text" input type.
*   Added new function to "File" class for fetching details of a single file
*   Created item views/pages for displaying the details of a single item (file, blog, vst, etc)
*   Removed some depricated files

### 0.1.6 (August 12th, 2015)
*   Added common license types to resource submission forms
*   Created tagging function in 'File' class
*   Applied tagging function to resource details in rousource views/pages
*   Added Composer and Elasticsearch packages
*   Added Composer autoloader to initialization file
*   Loading Elasticsearch through initialization file
*   Creating simple PHP search-engine of MySQL records

### 0.1.5 (August 5th, 2015)
*   Modifications to the 'File' class to display author field and format date
*   Minor copy edits to resource views/pages
*   Created 'resource' view/page for displaying individual file properties
*   Styling edits to 'edit profile' view/page
*   Added user files section to 'edit profile' view/page
*   Modified redirecting bug in user profile
*   Added PHP uppercase function to create_file.php parser
*   Added .md to allowed files array
*   Styling edits

### 0.1.4 (August 4th, 2015)
*   Added userFiles function to 'File' class
*   Modified existing functions in 'File' class in light of new userFiles function
*   Fixed bug that wiped out the details of a signed in user when they are visiting someone elses profile
*   Significant update to view/page/styling of user profile
*   Removed PHP ucfirst function from create_file.php parser

### 0.1.3 (August 3rd, 2015)
*   Added more secure and sophisticated form validation and error message handling to all asset submission form parsers
*   Added author, license, and access attributes to all asset submission forms
*   Improved on dynamic query constructor of 'File' class for more complex SQL query handling
*   Implimented privacy functions for files

### 0.1.2 (August 2nd, 2015)
*   Fixed capilization of 'NewDir' class
*   Cleared some redundant files
*   Fixed critical typo in 'NewDir' class
*   Changed absolute URL path in anchor tag to relative URL path in resource pages
*   Added to allowed file formats array
*   Minor copy edit to registratioin view/page

### 0.1.1 (July 28th, 2015)
*   Updated nagivation to point to all latest pages/views
*   Messages sent via 'flash' function now appear under initial welcome message on home page/view
*   Removed some depricated files
*   Fixed 'submit content' page/view
*   Updated form action locations for update_profile.php
*   Adjusted some line locations of style elements in custom.css to avoid using the !important param
*   Added dynamic user link to fileList function of 'File' class

### 0.1.0 (July 27th, 2015)
*   Revised registration page/view
*   Fixed typo in 'Newdir' class
*   Cleaned up and organized custom.css
*   Revised terms show/hide method
*   Updated profile pic and banner pic parsers in relation to new public directory
*   Added copy function for index redirect to user directories
*   Removed some depricated files
*   Fixed issue with profile pic in navigation

### 0.0.9 (July 26th, 2015)
*   Created remaining resources pages/views
*   Made file directory dynamic in fileList function of 'File' class
*   Increased default results per page to 10
*   Made some css class names and form names more generic
*   Added hidden form field for category
*   Minor content updates
*   Replaced app/parsers/create_module.php and app/parsers/upload_module.php in favor of app/parsers/create_file.php and app/parsers/upload_file.php more more generic file handling
*   Placed all client-side files in 'public' folder
*   Root index now redirects to 'public' folder

### 0.0.8 (July 24th, 2015)
*   Added documentation item to resources menu
*   Added breadcrumbs to main content pages
*   Styling main content pages
*   Formatted file lists using responsive tables
*   Added pagination functionality
*   Updates to modules page/view
*   Updated Bootstrap framework
*   Added icons to UI elements

### 0.0.7 (July 23rd, 2015)
*   Made 'File' class more eloquent by segmenting it into more functions

### 0.0.6 (July 22nd, 2015)
*   Removed some depricated and redundant files
*   Created 'File' class
*   Created modules page/view
*   Created file database entry functionality
*   Revised file upload to work with database entry form
*   Now handling file upload request via Ajax
*   Created progress bar and details display for file upload/database creation.
*   Added watch.js library
*   Made jQuery UX improvements

### 0.0.5 (July 10th, 2015)
*   Modified security redirects
*   Edited footer styling
*   Integrating file upload functionality

### 0.0.4 (June 23rd, 2015)

*   Integrated Resonance Design Member System V1 component for user registration, authentication and basic profile pages
NOTE: Will upgrade to Resonance Design Member System V2 once issues with that are ironed out
*   Integrated PHPMailer component for sending email from the app
*   Made navigation dynamic
*   Now importing all javascripts through PHP include

### 0.0.3 (June 1st, 2015)

*   Added and edited navigation items
*   Edits to navbar styling
*   Edit to README.md file

### 0.0.2 (May 31st, 2015)

*   Updated to latest version (3.3.4) of Bootstrap
*   Created animations CSS and JS
*   Updated fave icons and tiles
*   Added graphic assets
*   Styled navigation
*   Updates to site theme
*   Created primitive routing scheme
*   Updated documentation
*   Enhancements to navbar
*   Copy/content edits for usability and SEO

### 0.0.1 (May 29th, 2015)

*	Pulled base of 'public' from html5 boilerplate