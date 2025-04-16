// script.js

// Simulated list of items (this could come from a database or API)
function performSearch() {
    const searchQuery = document.getElementById('search-input').value.trim();
    if (!searchQuery) {
        alert("Please enter a search term!");
        return;
    }
    
    let found = false;
    for (let category in subCategoriesData) {
        subCategoriesData[category].forEach(subCategory => {
            if (subCategory.name.toLowerCase().includes(searchQuery.toLowerCase())) {
                found = true;
                alert(`${subCategory.name} is ${subCategory.available}.`);
            }
        });
    }
    
    if (!found) {
        alert("No results found. Please try again.");
    }
}

document.getElementById('search-button').addEventListener('click', performSearch);
document.getElementById('search-input').addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        performSearch();
    }
});

// Sub-categories data with availability and images
const subCategoriesData = {
    vegetables: [
        { name: 'Tomatoes', description: 'Fresh and juicy red tomatoes.', price: '$2.99/kg', available: 'Available', image: 'Tomatoes.jpg' },
        { name: 'Carrots', description: 'Crisp and healthy orange carrots.', price: '$1.49/kg', available: 'Out of Stock', image: 'Carrot.webp' }
    ],
    fruits: [
        { name: 'Apples', description: 'Sweet and crunchy apples.', price: '$3.50/kg', available: 'Available', image: 'Apples.jpg' },
        { name: 'Strawberries', description: 'Fresh Strawberries', price: '$1.20/kg', available: 'Available', image: 'Strawberries.WEBP' }
    ],
    flowers: [
        { name: 'Roses', description: 'Beautiful red roses for any occasion.', price: '$10.00/dozen', available: 'Available', image: 'Roses.jpg' },
        { name: 'Tulips', description: 'Elegant and colorful tulips.', price: '$8.00/dozen', available: 'Out of Stock', image: 'Tulip.jpg' }
    ],
    herbs: [
        { name: 'Basil', description: 'Fresh basil leaves for your cooking.', price: '$1.50/bunch', available: 'Available', image: 'Basil.jpg' },
        { name: 'Mint', description: 'Fragrant mint leaves for tea and cooking.', price: '$1.20/bunch', available: 'Available', image: 'Mint.webp' }
    ],
    sprouts: [
        { name: 'Alfalfa', description: 'Nutritious alfalfa sprouts.', price: '$2.00/pack', available: 'Available', image: 'Alfalfa.webp' },
        { name: 'Mung Beans', description: 'Fresh mung bean sprouts.', price: '$1.80/pack', available: 'Out of Stock', image: 'Mung.jpg' }
    ]
};
function showSubCategories(category) {
    // Define sub-categories with descriptions, prices, availability, and images
    // Sub-categories data with availability and images
  const subCategoriesData = {
    vegetables: [
        { 
            name: 'Tomatoes', 
            description: 'Fresh and juicy red tomatoes.', 
            price: '$2.99/kg', 
            available: 'Available',
            image: 'Tomatoes.jpg'  
        },
        { 
            name: 'Carrots', 
            description: 'Crisp and healthy orange carrots.',
            price: '$1.49/kg', 
            available: 'Out of Stock',
            image: 'Carrot.webp'
        }
    ],
    fruits: [
        { 
            name: 'Apples', 
            description: 'Sweet and crunchy apples.', 
            price: '$3.50/kg', 
            available: 'Available', 
            image: 'Apples.jpg'  
        },
        { 
            name: 'Strawberries', 
            description: 'Fresh Strawberries', 
            price: '$1.20/kg', 
            available: 'Available', 
            image: 'Strawberries.WEBP'  
        }
    ],
    flowers: [
        { 
            name: 'Roses', 
            description: 'Beautiful red roses for any occasion.',
            price: '$10.00/dozen', 
            available: 'Available',
            image: 'Roses.jpg'
        },
        { 
            name: 'Tulips', 
            description: 'Elegant and colorful tulips.',
            price: '$8.00/dozen', 
            available: 'Out of Stock',
            image: 'Tulip.jpg'
        }
    ],
    herbs: [
        { 
            name: 'Basil', 
            description: 'Fresh basil leaves for your cooking.',
            price: '$1.50/bunch', 
            available: 'Available',
            image: 'Basil.jpg'
        },
        { 
            name: 'Mint', 
            description: 'Fragrant mint leaves for tea and cooking.',
            price: '$1.20/bunch', 
            available: 'Available',
            image: 'Mint.webp'
        }
    ],
    sprouts: [
        { 
            name: 'Alfalfa', 
            description: 'Nutritious alfalfa sprouts.', 
            price: '$2.00/pack', 
            available: 'Available',
            image: 'Alfalfa.webp'
        },
        { 
            name: 'Mung Beans', 
            description: 'Fresh mung bean sprouts.', 
            price: '$1.80/pack', 
            available: 'Out of Stock',
            image: 'Mung.jpg'
        }
    ]
  };
  
  // Function to handle search and display availability message
  document.getElementById('search-button').addEventListener('click', function() {
    const searchQuery = document.getElementById('search-input').value.toLowerCase();
    const searchMessage = document.getElementById('search-message');
    
    // Hide the warning message initially
    searchMessage.classList.remove('show');
    
    // Check if the search query is not empty
    if (searchQuery) {
        let found = false;
        
        // Loop through the sub-categories to find the search term
        for (let category in subCategoriesData) {
            subCategoriesData[category].forEach(subCategory => {
                if (subCategory.name.toLowerCase().includes(searchQuery)) {
                    found = true;
                    if (subCategory.available === 'Out of Stock') {
                        searchMessage.textContent = `${subCategory.name} are Out of Stock.`;
                        searchMessage.classList.add('show');
                    } else {
                        searchMessage.textContent = `${subCategory.name} are Available.`;
                        searchMessage.classList.add('show');
                    }
                }
            });
        }
        
        // If no sub-category found for the search query
        if (!found) {
            searchMessage.textContent = "No results found. Please try again.";
            searchMessage.classList.add('show');
        }
    } else {
        // If the search input is empty
        searchMessage.textContent = "Please enter a search term!";
        searchMessage.classList.add('show');
    }
  });
  
  
    // Get the sub-categories container
    const subCategoriesContainer = document.getElementById('sub-categories');
  
    // Clear previous sub-categories
    subCategoriesContainer.innerHTML = '';
  
    // Create and append sub-category items dynamically
    subCategoriesData[category].forEach(subCategory => {
        const div = document.createElement('div');
        div.classList.add('sub-category-item');
        
        div.innerHTML = `
            <img src="${subCategory.image}" alt="${subCategory.name}" class="sub-category-image">
            <h3>${subCategory.name}</h3>
            <p class="sub-category-description">${subCategory.description}</p>
            <p class="sub-category-price">${subCategory.price}</p>
            <p class="sub-category-availability">${subCategory.available}</p>
        `;
        
        subCategoriesContainer.appendChild(div);
    });
  
    // Show the sub-categories container
    subCategoriesContainer.style.display = 'grid';
  }
  