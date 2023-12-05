Problem : If the product price is greater than 100 then non-logged in user should not be able to add that product to cart.

Meaning.

Only logged in customers should be able to add to cart if product price is greater than 100.

Show user error message that "You need to log-in for adding any product worth 100 or more"

Approach :
1. Create a module with required files i.e registration.php and etc/module.xml.
2. Find out which event is triggered when a product is added to cart. 
3. Write a observer (Observer/ValidateProductPrice.php) on that event just before product is added to cart
4. Add the required logic i.e. ` if price > 100 and user == NULL then throw ExceptionMessage('Need login...') ` in that Observer/ValidateProductPrice.php
5. Call that observer through the events.xml 

