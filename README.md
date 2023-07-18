**Dev Test Task:**
**Creating a Web Form for Zoho CRM Deals and Accounts using Vue.js and Laravel**

Objective: To create a web form using Vue.js and Laravel as a backend that allows users to create a
deal and account in Zoho CRM using the Zoho CRM API. The form should contain all the required
fields to create these records and the records must be linked to each other. Additionally, an
automatic token refresh mechanism must be implemented to allow creation of records from the
form at any time.

Scope: The form will be created using Vue.js and Laravel as a backend. It will include the following
features:
∙ Ability to create a deal and account in Zoho CRM
∙ Linking of the deal and account records in Zoho CRM
∙ Automatic token refresh mechanism for uninterrupted creation of records

Requirements: The form should include the following fields for the deal record:
∙ Deal name
∙ Deal stage

The form should include the following fields for the account record:
∙ Account name
∙ Account website
∙ Account phone
If there are other mandatory fields required by the system, they must also be present in the form.

The form should map each field to the corresponding Zoho CRM field as follows:
∙ Deal name maps to "Deal Name" in Zoho CRM
∙ Deal stage maps to "Stage" in Zoho CRM
∙ Account name maps to "Account Name" in Zoho CRM
∙ Account website maps to "Website" in Zoho CRM
∙ Account phone maps to "Phone" in Zoho CRM

The form should also include the following functionality:
∙ Validation of all form fields to ensure that valid values are entered
∙ Display of error messages if an invalid value is entered
∙ Display of a success message if the records are successfully created
∙ Display of an error message if the records fail to be created
∙ Use of Vue.js to create a dynamic and responsive user interface∙ 
∙ A submit button to create the deal and account records in Zoho CRM

The backend should be implemented using Laravel and should include the following:
∙ Integration with the Zoho CRM API for creating deals and accounts
∙ Implementation of the automatic token refresh mechanism
∙ Creation of the necessary routes and controllers to handle form submissions

**to build docker container: use:**

make dc-build

then install packages for vendors:

make bash

composer update

exit

********************************************************

**to start this program use:**

make dc-up


**it will be possible to test the application in a browser at localhost**

http://localhost - You will see a frontend
