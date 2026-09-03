// ========================================
// STANLEY TECH CONNECT - COMPLETE JAVASCRIPT
// Day 8: Functions, Scope & Events
// ========================================

console.log('%c Stanley Tech Connect ', 'background: #00d2ff; color: #1a1a2e; font-size: 18px; font-weight: bold; padding: 8px 16px; border-radius: 4px;');
console.log('%c Day 8: Functions, Scope & Events Complete ✅ ', 'background: #2ecc71; color: #fff; font-size: 14px; padding: 4px 12px; border-radius: 4px;');

// ========================================
// 1. FUNCTIONS
// ========================================

console.log('\n===== FUNCTION EXAMPLES =====');

// ----- Function Declaration -----
function greetUser() {
    console.log("Hello, welcome to Stanley Tech Connect!");
}

// ----- Function with Parameters -----
function greetByName(name) {
    console.log(`Hello ${name}! Welcome to STC.`);
}

// ----- Function that Returns a Value -----
function addNumbers(a, b) {
    return a + b;
}

// ----- Function with Multiple Parameters -----
function calculate(num1, num2, operator) {
    if (operator === '+') return num1 + num2;
    if (operator === '-') return num1 - num2;
    if (operator === '*') return num1 * num2;
    if (operator === '/') return num2 !== 0 ? num1 / num2 : "Cannot divide by zero";
    return "Invalid operator";
}

// ----- Calling Functions -----
greetUser();
greetByName("Stanley");

let sumResult = addNumbers(10, 5);
console.log(`Sum of 10 + 5 = ${sumResult}`);

console.log(`Calculate 10 + 5 = ${calculate(10, 5, '+')}`);
console.log(`Calculate 10 - 5 = ${calculate(10, 5, '-')}`);
console.log(`Calculate 10 * 5 = ${calculate(10, 5, '*')}`);
console.log(`Calculate 10 / 5 = ${calculate(10, 5, '/')}`);
console.log(`Calculate 10 / 0 = ${calculate(10, 0, '/')}`);

// ----- Function Expressions (Anonymous) -----
const greetExpression = function(name) {
    return `Hello ${name}! (from expression)`;
};
console.log(greetExpression("Stanley"));

// ----- Arrow Functions (Modern Way) -----
const multiply = (a, b) => a * b;
const sayHello = name => `Hello ${name}! (from arrow function)`;
const square = x => x * x;

console.log(`Multiply 5 * 3 = ${multiply(5, 3)}`);
console.log(sayHello("Stanley"));
console.log(`Square of 5 = ${square(5)}`);

// ----- Default Parameters -----
function greetWithDefault(name = "Guest") {
    return `Hello ${name}!`;
}
console.log(greetWithDefault());        // Hello Guest!
console.log(greetWithDefault("Stanley")); // Hello Stanley!

// ========================================
// 2. SCOPE
// ========================================

console.log('\n===== SCOPE EXAMPLES =====');

// ----- Global Scope -----
let globalName = "Stanley (Global)";
console.log(`Global variable: ${globalName}`);

function showGlobal() {
    console.log(`Inside function: ${globalName}`); // Can access global
}
showGlobal();

// ----- Local/Function Scope -----
function localScopeExample() {
    let localVariable = "I'm inside a function";
    console.log(`Local variable: ${localVariable}`);
    return localVariable;
}
localScopeExample();
// console.log(localVariable); // ❌ Error! Not accessible outside

// ----- Block Scope (let & const) -----
if (true) {
    let blockScoped = "I'm inside a block";
    const anotherBlock = "Also block scoped";
    console.log(`Block variable: ${blockScoped}`);
}
// console.log(blockScoped); // ❌ Error! Not accessible outside

// ----- Variable Shadowing -----
let name = "Global Stanley";
console.log(`Before function: ${name}`);

function showName() {
    let name = "Local Stanley"; // Shadows the global variable
    console.log(`Inside function: ${name}`); // Local Stanley
}
showName();
console.log(`After function: ${name}`); // Global Stanley

// ----- Scope Chain -----
let outer = "Outer";

function outerFunction() {
    let middle = "Middle";
    
    function innerFunction() {
        let inner = "Inner";
        console.log(`Inner can access: ${inner}, ${middle}, ${outer}`);
    }
    innerFunction();
    // console.log(inner); // ❌ Error! Not accessible here
}
outerFunction();

// ========================================
// 3. EVENTS
// ========================================

console.log('\n===== EVENT LISTENERS SETUP =====');

// Wait for DOM to load before adding event listeners
document.addEventListener('DOMContentLoaded', function() {
    console.log("DOM loaded - Setting up event listeners...");
    
    // ----- Click Event -----
    const demoButton = document.getElementById('demoButton');
    if (demoButton) {
        demoButton.addEventListener('click', function() {
            console.log('Button was clicked!');
            alert('Hello from the demo button!');
        });
    }
    
    // ----- Event Object Example -----
    const eventButton = document.getElementById('eventButton');
    if (eventButton) {
        eventButton.addEventListener('click', function(event) {
            console.log('\n===== EVENT OBJECT =====');
            console.log('Event type:', event.type);
            console.log('Target element:', event.target);
            console.log('Target ID:', event.target.id);
            console.log('Mouse X:', event.clientX);
            console.log('Mouse Y:', event.clientY);
            alert(`Event Details:\nType: ${event.type}\nTarget: ${event.target.tagName}\nX: ${event.clientX}\nY: ${event.clientY}`);
        });
    }
    
    // ----- Mouseover & Mouseout Events -----
    const hoverBox = document.getElementById('hoverBox');
    if (hoverBox) {
        hoverBox.addEventListener('mouseover', function() {
            this.style.backgroundColor = '#00d2ff';
            this.style.color = '#1a1a2e';
            this.textContent = '✅ Hovering!';
            console.log('Mouse entered the box');
        });
        
        hoverBox.addEventListener('mouseout', function() {
            this.style.backgroundColor = '#f0f4f8';
            this.style.color = '#333';
            this.textContent = '🖱️ Hover me!';
            console.log('Mouse left the box');
        });
    }
    
    // ----- Form Submit Event (Prevent Default) -----
    const demoForm = document.getElementById('demoForm');
    if (demoForm) {
        demoForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevents page refresh
            console.log('\n===== FORM SUBMITTED =====');
            
            const nameInput = document.getElementById('demoName');
            const emailInput = document.getElementById('demoEmail');
            
            if (nameInput && emailInput) {
                let name = nameInput.value.trim();
                let email = emailInput.value.trim();
                
                if (name.length < 2) {
                    alert('⚠️ Name must be at least 2 characters');
                    nameInput.style.borderColor = 'red';
                    return;
                }
                
                if (!email.includes('@') || !email.includes('.')) {
                    alert('⚠️ Please enter a valid email address');
                    emailInput.style.borderColor = 'red';
                    return;
                }
                
                console.log('Name:', name);
                console.log('Email:', email);
                alert(`✅ Form Submitted!\nName: ${name}\nEmail: ${email}`);
                
                // Clear form
                nameInput.value = '';
                emailInput.value = '';
                nameInput.style.borderColor = '#ddd';
                emailInput.style.borderColor = '#ddd';
                document.getElementById('emailError').textContent = '';
            }
        });
    }
    
    // ----- Input Event (Real-time validation) -----
    const emailInput = document.getElementById('demoEmail');
    const emailError = document.getElementById('emailError');
    
    if (emailInput && emailError) {
        emailInput.addEventListener('input', function() {
            let email = this.value;
            
            // Reset border color
            this.style.borderColor = '#ddd';
            
            if (email.length === 0) {
                emailError.textContent = '';
                emailError.style.color = '';
            } else if (email.includes('@') && email.includes('.')) {
                emailError.textContent = '✅ Valid email format';
                emailError.style.color = 'green';
                this.style.borderColor = 'green';
            } else {
                emailError.textContent = '❌ Invalid email format (need @ and .)';
                emailError.style.color = 'red';
                this.style.borderColor = 'red';
            }
        });
    }
    
    // ----- Keydown Event -----
    const keyInput = document.getElementById('keyInput');
    const keyDisplay = document.getElementById('keyDisplay');
    
    if (keyInput && keyDisplay) {
        keyInput.addEventListener('keydown', function(event) {
            keyDisplay.textContent = `⬇️ Key pressed: ${event.key} (Code: ${event.code})`;
            keyDisplay.style.color = '#00d2ff';
            console.log(`Key pressed: ${event.key}`);
        });
        
        keyInput.addEventListener('keyup', function(event) {
            keyDisplay.textContent = `⬆️ Key released: ${event.key}`;
            keyDisplay.style.color = '#2ecc71';
            console.log(`Key released: ${event.key}`);
        });
    }
    
    // ----- Event Delegation (Click on list items) -----
    const list = document.getElementById('demoList');
    if (list) {
        list.addEventListener('click', function(event) {
            if (event.target.tagName === 'LI') {
                console.log('List item clicked:', event.target.textContent);
                alert(`📌 You clicked: ${event.target.textContent}`);
            }
        });
    }
});

// ========================================
// 4. PRACTICAL EXAMPLES (Global Functions)
// ========================================

console.log('\n===== PRACTICAL FUNCTIONS =====');

// ----- Function to calculate average -----
function calculateAverage(num1, num2) {
    return (num1 + num2) / 2;
}

// ----- Function to check if a number is even -----
function isEven(number) {
    return number % 2 === 0;
}

// ----- Function to generate random number -----
function getRandomNumber(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

// ----- Function to format currency -----
function formatCurrency(amount) {
    return `₦${amount.toFixed(2)}`;
}

// ----- Test the functions -----
console.log(`Average of 10 and 20: ${calculateAverage(10, 20)}`);
console.log(`Is 10 even? ${isEven(10)}`);
console.log(`Is 7 even? ${isEven(7)}`);
console.log(`Random number between 1-10: ${getRandomNumber(1, 10)}`);
console.log(`Format currency: ${formatCurrency(1500.50)}`);

// ========================================
// 5. CONSOLE HELPERS (For debugging)
// ========================================

console.log('\n===== HELPER FUNCTIONS =====');

// Helper to test scope
function testScope() {
    let testVar = "I'm inside testScope";
    console.log(`Inside testScope: ${testVar}`);
    return testVar;
}

// Helper to demonstrate event listeners
function setupEventListeners() {
    console.log("Event listeners ready! Check DOM elements.");
}

// Export functions globally for console testing
window.STC = window.STC || {};
window.STC.calculate = calculate;
window.STC.calculateAverage = calculateAverage;
window.STC.isEven = isEven;
window.STC.getRandomNumber = getRandomNumber;
window.STC.formatCurrency = formatCurrency;
window.STC.greetUser = greetUser;
window.STC.greetByName = greetByName;
window.STC.testScope = testScope;

console.log('\n✅ Day 8: Functions, Scope & Events Complete!');
console.log('💡 Try these in console:');
console.log('  STC.calculate(10, 5, "+")');
console.log('  STC.calculateAverage(15, 25)');
console.log('  STC.isEven(8)');
console.log('  STC.getRandomNumber(1, 100)');
console.log('  STC.formatCurrency(2500)');