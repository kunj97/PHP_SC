/* Your solution should have comments. */

////////////////////////////////////////////////////////////////////////////////
//  Playing with numbers
////////////////////////////////////////////////////////////////////////////////

var window;  // Need for JSLint, program uses alert function

// Set all the input and output fields to the empty string.  Is called when the
// page is loaded, as Firefox does not clear input elements, and the left over
// values may cause confusion in running the system.

function initializeInputOutputFields() {
  "use strict";
  document.getElementById("listInput").value = "";
  document.getElementById("separatorInput").value = "";
  document.getElementById("resultNumberCount").value = "";
  document.getElementById("resultNumberTotal").value = "";
  document.getElementById("resultWordCount").value = "";
}

// Write a fixed string of numbers into the list input field.  Set the default
// separator string to be the space character.  The string space is used because
// the space character is difficult to see on the screen.

function setNumbers() {
  "use strict";
  document.getElementById("listInput").value = "1 2.2 3 4 5";
  document.getElementById("separatorInput").value = "space";
}

// Write a fixed string of words & numbers into the list input field.  Set the default
// separator string to be the space character.  The string space is used because
// the space character is difficult to see on the screen.

function setMixedList() {
  "use strict";
  document.getElementById("listInput").value = "1 a 2 b 3.5 c 4 d add";
  document.getElementById("separatorInput").value = "space";
}

// Write empty strings into all the result fields.
function clearResults() {
  "use strict";
  document.getElementById("resultNumberCount").value = "";
  document.getElementById("resultNumberTotal").value = "";
  document.getElementById("resultWordCount").value = "";
}

/******************************************************************************/
// Add Numbers function and subroutines

// Return the listSeparator, if there is one, otherwise return null.

function getListSeparator() {
  "use strict";
  // Get the separator for the list items.  If the string "space" occurs, then
  // set the separator to the space character, " ".
  
  var listSeparator = document.getElementById("separatorInput").value;
  if (listSeparator === "space") { listSeparator = " "; }
  else if (listSeparator === " ") {
    document.getElementById("separatorInput").value = "space";
  }
  
  // Check that a separator string has been entered.  If not then length is 0
  // and tell the user.
  
  if (listSeparator.length === 0) {
    window.alert("Enter a list item separator");
    listSeparator = null;
    clearResults();    // Empty the output fields to avoid confusion 
  }
  
  return listSeparator;
}

// Input is a string of numbers and words separated by listSeparator.
// Return as an array the number of numbers, their sum, and the number of words
// (non numbers).

function addNumbersBody(listSeparator) {
  "use strict";
  var theList = document.getElementById("listInput").value;
  var listItems = theList.split(listSeparator);
  var listItemCount = listItems.length;  // Remember the length of the list
  var listIndex = 0;     // Pointer to list items
  var numberCount = 0;   // Running total of the number of numbers in the list
  var numberTotal = 0;   // Running sum of the numbers in the list
  var wordCount = 0;     // Running total of the number of words in the list
  var item;              // A list item to be processed
  
  // Loop over all the items in the list
  
  while (listIndex < listItemCount) {
    item = Number(listItems[listIndex]);   // The item to process
    
    // Check if we have a number.  Need the test for the empty split item
    // because the empty string is taken as the number zero.
    
    if ( isNaN(item) || listItems[listIndex] === "" ) {       
      wordCount +=1;    // If a word (not a number), have one more word  
    }
    else {               
      numberCount += 1;     // If a number, then have one more number
      numberTotal += item;  // Add the number to the total sum.
    }
    listIndex += 1;     // Go to the next item in the list
  }
  
  // All items in the list have been processed. Return the answer.
  
  return [numberCount, numberTotal, wordCount];
}

//Display the result.

function displayForAddNumbers(theNumbers) {
  "use strict";
  
  // Did the list have at least one number?
  
  if (theNumbers[0] < 1) {
    window.alert("Not enough numbers in the list");
    document.getElementById("resultNumberCount").value = "";
    document.getElementById("resultNumberTotal").value = "";
    document.getElementById("resultWordCount").value = "";
  }
  else {
    document.getElementById("resultNumberCount").value = theNumbers[0];
    document.getElementById("resultNumberTotal").value = theNumbers[1];
    document.getElementById("resultWordCount").value = theNumbers[2];
  }
}

// addNumbers is invoked by a button.  It checks that a list separator has been
// entered. If yes, then there is work to do as described by the function
// addNumberBody, otherwise the program terminates with an alert that a
// separator is needed.

function addNumbers() {
  "use strict";
  var theSeparator = getListSeparator();
  
  if (theSeparator !== null) { // Separator exists. Do the work
    displayForAddNumbers(addNumbersBody(theSeparator));
  }  
}

/******************************************************************************/
// Do arithmetic function and subroutines

// Input is an array of numbers, the first is a count of the number of numbers
// that was used to create the total represented by the second number.

function displayForDoArithmetic (theNumbersForDisplay) {
  "use strict";
  document.getElementById("resultNumberCount").value = theNumbersForDisplay[0];
  document.getElementById("resultNumberTotal").value = theNumbersForDisplay[1];   
  document.getElementById("resultWordCount").value = "";
}

// Input is a string that may contain one of the arithmetic operators add,
// subtract,multiply or divide.
// The operator, if it exists is returned as a string, otherwise the null
// is returned.

function getTheOperator (theList) {
  "use strict";
  
  // Operator will contain the name of the arithmetic operator in the list
  // Null shows there is no operator in the list.
  
  var operator = null;
  
  // If multiple arithmetic operator names are in the list, then use
  // the last one found in the following list.
  
  if (theList.indexOf("add") >= 0)      { operator = "add"; }
  if (theList.indexOf("subtract") >= 0) { operator = "subtract"; }
  if (theList.indexOf("multiply") >= 0) { operator = "multiply"; }
  if (theList.indexOf("divide") >= 0)   { operator = "divide"; }
  
  // Check if there was an operator in the list.
  
  if (operator === null) {
    window.alert("Need one of add, subtract, multiply, divide");
    clearResults();
  }
  return operator;
}

// Precondition:
//   theNumbers is an array that contains at least one number and
//   only constains number.
//   operator is string that is one of add, subtract, multiply or divide.
// 
// The returned result is an array with the first item being the number of
// numbers and the second item ds the list reduced by placing the operator
// between the numbers and doing the operation in strict order from the first
// number to the last number.

function processTheNumbers (theNumbers, operator) {
  "use strict";
  var theNumbersCount = theNumbers.length;  // Remember the length of the list
  var numberIndex;    // Pointer to list items
  var aNumber;        // A number to be processed
  var Result;         // The result of doing the input arithmetic operation
  
  Result = theNumbers[0];
  
  numberIndex = 1;
  while (numberIndex < theNumbersCount) {
    aNumber = theNumbers[numberIndex];  // Get the current item  
    
    switch (operator) {  // Do the operation found in the input list.
      case "add":      Result += aNumber; break;
      case "subtract": Result -= aNumber; break;
      case "multiply": Result *= aNumber; break;
      case "divide":   Result /= aNumber; break;
    }
    numberIndex += 1;    // Ready to process the next number.
  }
  
  return [theNumbersCount, Result];
}

// Precondition: theList is a string, and theSeparator is a non-empty string.
// The result is an array containing the substrings of theList that represent
// numbers.

function getTheNumbers(theList, theSeparator) {
  "use strict";
  var listItems = theList.split(theSeparator);
  var itemCount = listItems.length;
  var listIndex = 0;
  var numberIndex = -1;  // Indicate that we have no numbers.
  var theNumbers = [];
  var item;
  
  while (listIndex < itemCount) {
    
    item = Number(listItems[listIndex]);  // Get the next item in the list
    
    // Double negative indicates a number exists but we have to make sure
    // that is not due to an empty string, which is not a number for this
    // program.
    
    if ( !isNaN(item) && listItems[listIndex] !== ""  ) { 
      numberIndex += 1;                // New index value for saving a number
      theNumbers[numberIndex] = item;  // Save the number in its list
    }
    listIndex += 1;    // Go to the next list item
  }
  return theNumbers;
}

// doArithment is a function invoked by a button. The routine verifies that
// a non-empty string separator exists, that a valid arithmetic operator exists,
// and that non-zero length list of numbers has been obtained.

function doArithment() {
  "use strict";
  var theSeparator = getListSeparator();
  var theList = document.getElementById("listInput").value;
  var operator = getTheOperator(theList);
  var theNumbers;
  
  // If a separator and an operator exisit, then there is work to do,
  // otherwise an alert is displayed.
  
  if (theSeparator !== null && operator !== null) { // Process the numbers.
    theNumbers = getTheNumbers(theList, theSeparator);
    
    // Can only continue if a number has been found
    
    if (theNumbers.length === 0) {
      window.alert("Not enough numbers in the list");
      clearResults();
    }
    else {
      displayForDoArithmetic(processTheNumbers(theNumbers, operator));
    }
  }
}
