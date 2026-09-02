// ========================================
// STANLEY TECH CONNECT - COMPLETE JAVASCRIPT
// Day 7: JavaScript Basics - Variables, Data Types & Operators
// ========================================

console.log('%c Stanley Tech Connect ', 'background: #00d2ff; color: #1a1a2e; font-size: 18px; font-weight: bold; padding: 8px 16px; border-radius: 4px;');
console.log('%c Day 7: JavaScript Basics Complete ✅ ', 'background: #2ecc71; color: #fff; font-size: 14px; padding: 4px 12px; border-radius: 4px;');

// ========================================
// 1. VARIABLES
// ========================================

// let - Can be changed (block-scoped)
let studentName = "Stanley Okonkwo";
let studentAge = 30;
let isEnrolled = true;

// const - Cannot be changed (block-scoped)
const COMPANY_NAME = "Stanley Tech Connect";
const FOUNDER = "Stanley Okonkwo";
const YEAR_ESTABLISHED = 2024;

// var - Old way (function-scoped) - Avoid using
var oldWay = "Not recommended for modern code";

console.log("===== VARIABLES =====");
console.log(`Student Name: ${studentName}`);
console.log(`Student Age: ${studentAge}`);
console.log(`Is Enrolled: ${isEnrolled}`);
console.log(`Company: ${COMPANY_NAME}`);

// ========================================
// 2. DATA TYPES
// ========================================

// Primitive Data Types
let stringType = "Hello World";                    // String
let numberType = 42;                              // Number
let numberTypeDecimal = 3.14;                     // Number (decimal)
let booleanTypeTrue = true;                       // Boolean
let booleanTypeFalse = false;                     // Boolean
let undefinedType;                                // Undefined (declared but not assigned)
let nullType = null;                              // Null (intentionally empty)

// Reference Data Types
let arrayType = ["HTML", "CSS", "JavaScript", "PHP", "MySQL"];  // Array
let objectType = {                                  // Object
    firstName: "Stanley",
    lastName: "Okonkwo",
    age: 30,
    skills: ["HTML", "CSS", "JS"]
};

console.log("\n===== DATA TYPES =====");
console.log(`String: ${stringType} - Type: ${typeof stringType}`);
console.log(`Number: ${numberType} - Type: ${typeof numberType}`);
console.log(`Number (Decimal): ${numberTypeDecimal} - Type: ${typeof numberTypeDecimal}`);
console.log(`Boolean (true): ${booleanTypeTrue} - Type: ${typeof booleanTypeTrue}`);
console.log(`Boolean (false): ${booleanTypeFalse} - Type: ${typeof booleanTypeFalse}`);
console.log(`Undefined: ${undefinedType} - Type: ${typeof undefinedType}`);
console.log(`Null: ${nullType} - Type: ${typeof nullType}`); // JavaScript bug - shows "object"
console.log(`Array: ${arrayType} - Type: ${typeof arrayType}`);
console.log(`Object: ${JSON.stringify(objectType)} - Type: ${typeof objectType}`);

// ========================================
// 3. ARITHMETIC OPERATORS
// ========================================

let num1 = 20;
let num2 = 7;

let addition = num1 + num2;
let subtraction = num1 - num2;
let multiplication = num1 * num2;
let division = num1 / num2;
let modulus = num1 % num2;
let exponent = num1 ** 2; // num1 squared
let increment = num1++;
let decrement = num2--;

console.log("\n===== ARITHMETIC OPERATORS =====");
console.log(`num1 = ${num1}, num2 = ${num2}`);
console.log(`Addition (${num1} + ${num2}): ${addition}`);
console.log(`Subtraction (${num1} - ${num2}): ${subtraction}`);
console.log(`Multiplication (${num1} * ${num2}): ${multiplication}`);
console.log(`Division (${num1} / ${num2}): ${division}`);
console.log(`Modulus (${num1} % ${num2}): ${modulus}`);
console.log(`Exponent (${num1} ** 2): ${exponent}`);

// ========================================
// 4. ASSIGNMENT OPERATORS
// ========================================

let x = 10;
console.log("\n===== ASSIGNMENT OPERATORS =====");
console.log(`Initial x = ${x}`);

x += 5;  // x = x + 5
console.log(`x += 5 : ${x}`);

x -= 3;  // x = x - 3
console.log(`x -= 3 : ${x}`);

x *= 2;  // x = x * 2
console.log(`x *= 2 : ${x}`);

x /= 4;  // x = x / 4
console.log(`x /= 4 : ${x}`);

x %= 3;  // x = x % 3
console.log(`x %= 3 : ${x}`);

// ========================================
// 5. COMPARISON OPERATORS
// ========================================

let a = 10;
let b = "10";
let c = 20;

console.log("\n===== COMPARISON OPERATORS =====");
console.log(`a = ${a} (Number), b = "${b}" (String), c = ${c} (Number)`);

// Loose Equality (==) - Checks value only
console.log(`a == b : ${a == b} (Loose equality - value only)`);

// Strict Equality (===) - Checks value AND type
console.log(`a === b : ${a === b} (Strict equality - value AND type)`);

// Loose Inequality (!=)
console.log(`a != c : ${a != c}`);

// Strict Inequality (!==)
console.log(`a !== b : ${a !== b}`);

// Greater Than / Less Than
console.log(`a > c : ${a > c}`);
console.log(`a < c : ${a < c}`);
console.log(`a >= b : ${a >= b}`);
console.log(`a <= b : ${a <= b}`);

// ========================================
// 6. LOGICAL OPERATORS
// ========================================

let isAdmin = true;
let isLoggedIn = true;
let isGuest = false;

console.log("\n===== LOGICAL OPERATORS =====");
console.log(`isAdmin = ${isAdmin}, isLoggedIn = ${isLoggedIn}, isGuest = ${isGuest}`);

// AND (&&) - Both must be true
console.log(`isAdmin && isLoggedIn : ${isAdmin && isLoggedIn} (Both true)`);
console.log(`isAdmin && isGuest : ${isAdmin && isGuest} (One false)`);

// OR (||) - At least one must be true
console.log(`isAdmin || isGuest : ${isAdmin || isGuest} (At least one true)`);
console.log(`isLoggedIn || isGuest : ${isLoggedIn || isGuest} (Both true)`);

// NOT (!) - Inverts the value
console.log(`!isAdmin : ${!isAdmin}`);
console.log(`!isGuest : ${!isGuest}`);

// Combined Conditions
let canAccessDashboard = isLoggedIn && (isAdmin || isGuest);
console.log(`Can access dashboard? ${canAccessDashboard}`);

// ========================================
// 7. STRING OPERATORS & TEMPLATE LITERALS
// ========================================

let firstName = "Stanley";
let lastName = "Okonkwo";
let fullName = firstName + " " + lastName; // Concatenation

console.log("\n===== STRING OPERATORS =====");
console.log(`First Name: ${firstName}`);
console.log(`Last Name: ${lastName}`);
console.log(`Full Name (Concatenation): ${fullName}`);

// Template Literals - Modern way
let greeting = `Hello, my name is ${firstName} ${lastName}.`;
let bio = `
    Name: ${firstName} ${lastName}
    Role: Lead Instructor at ${COMPANY_NAME}
    Age: ${studentAge}
    Experience: 8+ years
    Skills: ${arrayType.join(", ")}
`;

console.log("\n===== TEMPLATE LITERALS =====");
console.log(greeting);
console.log(bio);

// ========================================
// 8. TYPE COERCION
// ========================================

console.log("\n===== TYPE COERCION =====");

// String + Number = String
console.log(`"5" + 3 = ${"5" + 3} (Number becomes string)`);

// String - Number = Number
console.log(`"5" - 3 = ${"5" - 3} (String becomes number)`);

// Boolean to Number
console.log(`true + 1 = ${true + 1} (true becomes 1)`);
console.log(`false + 1 = ${false + 1} (false becomes 0)`);

// Loose vs Strict Equality
console.log(`5 == "5" : ${5 == "5"} (Loose - type coercion)`);
console.log(`5 === "5" : ${5 === "5"} (Strict - no type coercion)`);

// ========================================
// 9. typeof OPERATOR
// ========================================

console.log("\n===== typeof OPERATOR =====");
console.log(`typeof "Hello": ${typeof "Hello"}`);
console.log(`typeof 42: ${typeof 42}`);
console.log(`typeof true: ${typeof true}`);
console.log(`typeof undefined: ${typeof undefined}`);
console.log(`typeof null: ${typeof null} (JavaScript bug - should be null)`);
console.log(`typeof {}: ${typeof {}}`);
console.log(`typeof []: ${typeof []}`);
console.log(`typeof function(){}: ${typeof function(){}}`);

// ========================================
// 10. PRACTICE EXAMPLES
// ========================================

console.log("\n===== PRACTICE EXAMPLES =====");

// Example 1: Simple Calculator
function calculate(num1, num2, operator) {
    switch(operator) {
        case '+': return num1 + num2;
        case '-': return num1 - num2;
        case '*': return num1 * num2;
        case '/': return num2 !== 0 ? num1 / num2 : "Cannot divide by zero";
        case '%': return num2 !== 0 ? num1 % num2 : "Cannot divide by zero";
        default: return "Invalid operator";
    }
}

console.log(`10 + 5 = ${calculate(10, 5, '+')}`);
console.log(`10 - 5 = ${calculate(10, 5, '-')}`);
console.log(`10 * 5 = ${calculate(10, 5, '*')}`);
console.log(`10 / 5 = ${calculate(10, 5, '/')}`);
console.log(`10 % 5 = ${calculate(10, 5, '%')}`);

// Example 2: User Greeting
function greetUser(name, age, isStudent) {
    let status = isStudent ? "a student" : "not a student";
    return `Hello ${name}! You are ${age} years old and you are ${status}.`;
}

console.log(greetUser("Stanley", 30, false));
console.log(greetUser("John", 20, true));

// ========================================
// 11. CONSOLE HELPERS (For debugging)
// ========================================

// Helper to check if a variable is a number
function isNumber(value) {
    return typeof value === 'number' && !isNaN(value);
}

// Helper to check if a variable is a string
function isString(value) {
    return typeof value === 'string';
}

// Helper to check if a variable is an array
function isArray(value) {
    return Array.isArray(value);
}

console.log("\n===== HELPER FUNCTIONS =====");
console.log(`isNumber(42): ${isNumber(42)}`);
console.log(`isNumber("42"): ${isNumber("42")}`);
console.log(`isString("Hello"): ${isString("Hello")}`);
console.log(`isString(42): ${isString(42)}`);
console.log(`isArray([1,2,3]): ${isArray([1,2,3])}`);
console.log(`isArray({}): ${isArray({})}`);

console.log("\n✅ Day 7: JavaScript Basics Complete!");

// Expose helpers globally
window.STC = window.STC || {};
window.STC.calculate = calculate;
window.STC.greetUser = greetUser;
window.STC.isNumber = isNumber;
window.STC.isString = isString;
window.STC.isArray = isArray;