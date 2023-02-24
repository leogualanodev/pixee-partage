// script qui permet d'affichier en scroll de la page 

let articlesPerPage = 12; // Le nombre d'articles à afficher par page
let currentPage = 1; 
let articles = document.querySelectorAll(".image");
console.log(articles)
// La page courante
// let totalArticles = container.children().length;

hideNextArticles();
function hideNextArticles() {
    // Calculate the index of the first article to hide on the page
    const startIndex = currentPage * articlesPerPage;
    
  
    // Show the next set of articles by setting the "display" property to "none"
    for (let i = startIndex;  i < articles.length; i++) {

      articles[i].style.display = "none";
      
    }
  
   
    
}
  
  // Function to check if the user has scrolled to the bottom of the page
  function checkScroll() {
    // Get the height of the page content
    const pageHeight = document.documentElement.scrollHeight;
    // Get the current scroll position of the window
    const scrollPosition = window.innerHeight + window.pageYOffset;
  
    // If the user has scrolled to the bottom of the page, load the next set of articles
    if (scrollPosition >= pageHeight) {
        // calcultae the page before 
        let pageBefore = currentPage ;
        // calculate the next articles to show on a scroll to the bottom  
        let articleFlex = pageBefore * articlesPerPage ;
        // current page take value of +1 for the next event scroll bottom
        currentPage = currentPage + 1 ;
        for ( let i= articleFlex ; i < articleFlex + articlesPerPage ; i++){
            articles[i].style.display = 'flex';
        }
        
    }
  }
  
  // Add a scroll event listener to the window object
  window.addEventListener("scroll", checkScroll);