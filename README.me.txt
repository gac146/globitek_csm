# Project 1 - Globitek CMS

Time spent: 6 hours spent in total

## User Stories

The following **required** functionality is completed:

1. [x]  Required: Create a Users Table
  * [ ]  Required: Use the command line to connect to the database "globitek".
  * [ ]  Required: Define a table "users" with the required columns.

2. [x]  Required: Create a Page with an HTML Form
  * [ ]  Required: It has required text inputs.
  * [ ]  Required: It submits to itself.
  * [ ]  Required: It looks correct in a browser.
  
3. [x]  Required: Detect when the form is submitted.
  * [ ]  Required: When page loads, page displays the form.
  * [ ]  Required: When form submits, page retrieves the form data.

4. [x]  Required: Validate form data.
  * [ ]  Required: Require the provided validation functions library.
  * [ ]  Required: Validate the presence of all form values.
  * [ ]  Required: Validate that no values are longer than 255 characters.
  * [ ]  Required: Validate that first\_name and last\_name have at least 2 characters.
  * [ ]  Required: Validate that username has at least 8 characters.
  * [ ]  Required: Validate that email contains a "@".

5. [x]  Required: Display form errors if any validations fail.
  * [ ]  Required: Do not submit the data to the database.
  * [ ]  Required: Redisplay the form with the submitted values filled in.
  * [ ]  Required: Report all errors as a list above the form.
  * [ ]  Required: Test each field to ensure you get the expected errors.

6. [x]  Required: Submit successfully-validated form values to the database.
  * [ ]  Required: Write an SQL insert statement.
  * [ ]  Required: Add current date and time to "created\_at".
  * [ ]  Required: Follow best practices regarding the query result and database connection.
  * [ ]  Required: Use the command line to check the records.

7. [x]  Required: Redirect the user to a confirmation page.
    * [ ]  Required: Locate the page "public/registration\_success.php".
    * [ ]  Required: Redirect the user to the new page. ([Tips](#!hints))

8. [x]  Required: Sanitize all dynamic output for HTML. ([Tips](#!hints))


The following advanced user stories are optional:

* [ ]  Bonus 1: Validate that form values contain only whitelisted characters.

* [x]  Bonus 2: Validate the uniqueness of the username. I also validated the uniqueness of the email account.


## Video Walkthrough

Here's a walkthrough of implemented user stories:

<img src='http://i.imgur.com/F814Vil.gif' title='Video Walkthrough' width='' alt='Video Walkthrough' />

GIF created with [LiceCap](http://www.cockos.com/licecap/).

## Notes

The main challenge for me in this assignment was to learn how to use all the database commands. First time using MySql.
But after researching online and looking up a few commands it was not too difficult.

## License

    Copyright [2017] [Gustavo Carbone]

    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at

        http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.