// ========================================
// STANLEY TECH CONNECT - COMPLETE JAVASCRIPT
// Day 9: DOM Manipulation - Select, Modify, Create
// ========================================

console.log('%c Stanley Tech Connect ', 'background: #00d2ff; color: #1a1a2e; font-size: 18px; font-weight: bold; padding: 8px 16px; border-radius: 4px;');
console.log('%c Day 9: DOM Manipulation Complete ✅ ', 'background: #2ecc71; color: #fff; font-size: 14px; padding: 4px 12px; border-radius: 4px;');

// Wait for DOM to load
document.addEventListener('DOMContentLoaded', function() {
    console.log('\n===== DAY 9: DOM MANIPULATION =====');
    
    // ========================================
    // 1. SELECTING ELEMENTS
    // ========================================
    
    console.log('\n===== 1. SELECTING ELEMENTS =====');
    
    // By ID
    let mainTitle = document.getElementById('mainTitle');
    if (mainTitle) {
        console.log('✅ By ID:', mainTitle);
    }
    
    // By Class (returns HTMLCollection)
    let cards = document.getElementsByClassName('card');
    console.log('✅ By Class:', cards.length, 'cards found');
    
    // By Tag Name (returns HTMLCollection)
    let paragraphs = document.getElementsByTagName('p');
    console.log('✅ By Tag Name:', paragraphs.length, 'paragraphs found');
    
    // Query Selector - First match
    let firstCard = document.querySelector('.card');
    if (firstCard) {
        console.log('✅ First Card:', firstCard);
    }
    
    // Query Selector All - All matches (NodeList)
    let allCards = document.querySelectorAll('.card');
    console.log('✅ All Cards:', allCards.length, 'cards found');
    
    // ========================================
    // 2. MODIFYING ELEMENTS
    // ========================================
    
    console.log('\n===== 2. MODIFYING ELEMENTS =====');
    
    // Change text content
    let demoHeader = document.getElementById('demoHeader');
    if (demoHeader) {
        demoHeader.textContent = 'DOM Manipulation Demo';
        console.log('✅ Text changed to:', demoHeader.textContent);
    }
    
    // Change HTML content
    let contentArea = document.getElementById('contentArea');
    if (contentArea) {
        contentArea.innerHTML = '<strong>✅ This is bold text!</strong>';
        console.log('✅ HTML changed');
    }
    
    // Change styles
    let styleBox = document.getElementById('styleBox');
    if (styleBox) {
        styleBox.style.backgroundColor = '#00d2ff';
        styleBox.style.color = '#1a1a2e';
        styleBox.style.padding = '20px';
        styleBox.style.borderRadius = '12px';
        styleBox.style.textAlign = 'center';
        styleBox.style.fontWeight = 'bold';
        console.log('✅ Styles applied');
    }
    
    // Add/remove classes
    let classBox = document.getElementById('classBox');
    if (classBox) {
        classBox.classList.add('highlight');
        console.log('✅ Class added');
    }
    
    // Change attributes
    let demoImage = document.getElementById('demoImage');
    if (demoImage) {
        demoImage.setAttribute('alt', 'Demo Image');
        demoImage.setAttribute('title', 'Hover to see this');
        console.log('✅ Attributes updated');
    }
    
    // ========================================
    // 3. CHARACTER COUNTER
    // ========================================
    
    console.log('\n===== 3. CHARACTER COUNTER =====');
    
    let charInput = document.getElementById('charInput');
    let charDisplay = document.getElementById('charDisplay');
    
    if (charInput && charDisplay) {
        charInput.addEventListener('input', function() {
            let length = this.value.length;
            charDisplay.textContent = `Characters: ${length}`;
            
            if (length < 3 && length > 0) {
                charDisplay.style.color = '#e74c3c';
                charDisplay.textContent = `⚠️ Min 3 characters (${length})`;
            } else if (length >= 3) {
                charDisplay.style.color = '#2ecc71';
                charDisplay.textContent = `✅ Good! (${length})`;
            } else {
                charDisplay.style.color = '#888';
                charDisplay.textContent = `Characters: 0`;
            }
        });
        console.log('✅ Character counter initialized');
    }
    
    // ========================================
    // 4. DYNAMIC LIST
    // ========================================
    
    console.log('\n===== 4. DYNAMIC LIST =====');
    
    let addItemBtn = document.getElementById('addItemBtn');
    let itemInput = document.getElementById('itemInput');
    let dynamicList = document.getElementById('dynamicList');
    
    if (addItemBtn && itemInput && dynamicList) {
        addItemBtn.addEventListener('click', function() {
            let text = itemInput.value.trim();
            
            if (text === '') {
                alert('⚠️ Please enter an item');
                return;
            }
            
            // Create list item
            let li = document.createElement('li');
            li.style.cssText = `
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 10px 15px;
                background: #f8f9fa;
                margin-bottom: 5px;
                border-radius: 8px;
                transition: all 0.3s ease;
                animation: fadeInUp 0.3s ease forwards;
            `;
            
            li.innerHTML = `
                <span>${text}</span>
                <button style="
                    background: #e74c3c;
                    color: white;
                    border: none;
                    border-radius: 4px;
                    padding: 5px 12px;
                    cursor: pointer;
                    font-size: 14px;
                    transition: all 0.3s ease;
                ">Delete</button>
            `;
            
            // Add delete functionality
            li.querySelector('button').addEventListener('click', function() {
                li.style.transform = 'scale(0.9)';
                li.style.opacity = '0';
                setTimeout(() => li.remove(), 300);
                console.log('🗑️ Item deleted:', text);
            });
            
            // Add hover effect
            li.addEventListener('mouseenter', function() {
                this.style.backgroundColor = '#e9ecef';
                this.style.transform = 'translateX(5px)';
            });
            li.addEventListener('mouseleave', function() {
                this.style.backgroundColor = '#f8f9fa';
                this.style.transform = 'translateX(0)';
            });
            
            dynamicList.appendChild(li);
            console.log('✅ Item added:', text);
            
            // Clear input
            itemInput.value = '';
            itemInput.focus();
        });
        
        // Add on Enter key
        itemInput.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                addItemBtn.click();
            }
        });
        
        console.log('✅ Dynamic list initialized');
    }
    
    // ========================================
    // 5. TOGGLE VISIBILITY
    // ========================================
    
    console.log('\n===== 5. TOGGLE VISIBILITY =====');
    
    let toggleBtn = document.getElementById('toggleBtn');
    let toggleBox = document.getElementById('toggleBox');
    
    if (toggleBtn && toggleBox) {
        toggleBtn.addEventListener('click', function() {
            if (toggleBox.style.display === 'none') {
                toggleBox.style.display = 'block';
                this.textContent = 'Hide Box';
                this.className = 'btn btn-danger';
                console.log('📦 Box shown');
            } else {
                toggleBox.style.display = 'none';
                this.textContent = 'Show Box';
                this.className = 'btn btn-primary';
                console.log('📦 Box hidden');
            }
        });
        console.log('✅ Toggle initialized');
    }
    
    // ========================================
    // 6. COUNTER
    // ========================================
    
    console.log('\n===== 6. COUNTER =====');
    
    let counterBtn = document.getElementById('counterBtn');
    let counterDisplay = document.getElementById('counterDisplay');
    let resetBtn = document.getElementById('resetBtn');
    let count = 0;
    
    if (counterBtn && counterDisplay) {
        counterBtn.addEventListener('click', function() {
            count++;
            counterDisplay.textContent = count;
            console.log('🔢 Counter:', count);
            
            // Change color based on count
            if (count > 10) {
                counterDisplay.style.color = '#e74c3c';
                counterDisplay.style.fontSize = '2.5rem';
                counterDisplay.style.transition = 'all 0.3s ease';
            } else if (count > 5) {
                counterDisplay.style.color = '#ffc107';
                counterDisplay.style.fontSize = '2rem';
            } else {
                counterDisplay.style.color = '#2ecc71';
                counterDisplay.style.fontSize = '1.5rem';
            }
        });
        console.log('✅ Counter initialized');
    }
    
    // ========================================
    // 7. RESET ALL
    // ========================================
    
    console.log('\n===== 7. RESET ALL =====');
    
    if (resetBtn) {
        resetBtn.addEventListener('click', function() {
            // Reset counter
            if (counterDisplay) {
                count = 0;
                counterDisplay.textContent = '0';
                counterDisplay.style.color = '#2ecc71';
                counterDisplay.style.fontSize = '1.5rem';
            }
            
            // Clear list
            if (dynamicList) {
                dynamicList.innerHTML = '';
            }
            
            // Clear input
            if (itemInput) {
                itemInput.value = '';
            }
            
            // Reset toggle box
            if (toggleBox && toggleBtn) {
                toggleBox.style.display = 'block';
                toggleBtn.textContent = 'Hide Box';
                toggleBtn.className = 'btn btn-danger';
            }
            
            // Reset char input
            if (charInput && charDisplay) {
                charInput.value = '';
                charDisplay.textContent = 'Characters: 0';
                charDisplay.style.color = '#888';
            }
            
            console.log('🔄 All reset!');
        });
        console.log('✅ Reset button initialized');
    }
    
    // ========================================
    // 8. DYNAMIC CARDS
    // ========================================
    
    console.log('\n===== 8. DYNAMIC CARDS =====');
    
    function createCard(title, description, icon) {
        let card = document.createElement('div');
        card.className = 'card';
        card.style.cssText = `
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            text-align: center;
            transition: all 0.3s ease;
            cursor: default;
            border: 1px solid transparent;
        `;
        
        card.innerHTML = `
            <div style="font-size: 2.5rem; margin-bottom: 10px;">${icon}</div>
            <h3 style="margin: 10px 0 5px; color: #1a1a2e; font-size: 1.1rem;">${title}</h3>
            <p style="color: #666; font-size: 0.9rem; margin: 0;">${description}</p>
        `;
        
        // Add hover effect
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
            this.style.boxShadow = '0 8px 30px rgba(0,0,0,0.12)';
            this.style.borderColor = 'rgba(0, 210, 255, 0.2)';
        });
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 2px 10px rgba(0,0,0,0.05)';
            this.style.borderColor = 'transparent';
        });
        
        return card;
    }
    
    let cardContainer = document.getElementById('cardContainer');
    if (cardContainer) {
        let items = [
            { title: 'JavaScript Basics', desc: 'Learn the fundamentals', icon: '📚' },
            { title: 'PHP & MySQL', desc: 'Build dynamic websites', icon: '🗄️' },
            { title: 'React.js', desc: 'Modern frontend development', icon: '⚛️' },
            { title: 'Full-Stack', desc: 'Complete web development', icon: '🚀' }
        ];
        
        items.forEach(item => {
            let card = createCard(item.title, item.desc, item.icon);
            cardContainer.appendChild(card);
        });
        console.log('✅ 4 cards created and added');
    }
    
    // ========================================
    // 9. DOM TRAVERSAL
    // ========================================
    
    console.log('\n===== 9. DOM TRAVERSAL =====');
    
    let demoTraverse = document.getElementById('demoTraverse');
    if (demoTraverse) {
        console.log('✅ Element found:', demoTraverse);
        console.log('   Parent:', demoTraverse.parentElement);
        console.log('   Children:', demoTraverse.children.length);
        console.log('   Next Sibling:', demoTraverse.nextElementSibling);
        console.log('   Previous Sibling:', demoTraverse.previousElementSibling);
    }
    
    // ========================================
    // 10. CONSOLE HELPERS
    // ========================================
    
    console.log('\n===== 10. CONSOLE HELPERS =====');
    
    // Helper to select elements
    window.$ = function(selector) {
        return document.querySelector(selector);
    };
    
    window.$$ = function(selector) {
        return document.querySelectorAll(selector);
    };
    
    // Helper to create elements
    window.create = function(tag, content, className) {
        let el = document.createElement(tag);
        if (content) el.textContent = content;
        if (className) el.className = className;
        return el;
    };
    
    console.log('✅ Helpers available: $(), $$(), create()');
    console.log('💡 Try: $(".card") or $$("p")');
    
    console.log('\n✅ Day 9: DOM Manipulation Complete!');
});