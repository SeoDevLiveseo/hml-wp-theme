<div class="wrap">
   <div class="search">
      <input type="text" class="searchTerm" placeholder="What are you looking for?">
      <button type="submit" class="searchButton">
        <i class="fa fa-search"></i>
     </button>
   </div>
</div>

<style>
    /*Barra de pesquisa*/

body{
  background: #f2f2f2;
  font-family: 'Open Sans', sans-serif;
}


.search {
  width: 100%;
  position: relative;
  display: flex;
}

.Search-section{
    width: 40%;
}

.searchTerm {
  width: 100%;
  border: 3px solid #ccaa00;
  border-right: none;
  padding: 11px;
  height: 30px;
  border-radius: 5px 0 0 5px;
  outline: none;
  color: #9DBFAF;
  font-size: 12px;
}

.searchTerm:focus{
  color: #00B4CC;
}

.searchButton {
  width: 40px;
  height: 29px;
  border: 1px solid #00B4CC;
  background: #F4940B;
  text-align: center;
  color: #fff;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  font-size: 20px;
}

/*Resize the wrap to see the search bar change!*/
.wrap{
  width: 60%;
  position: relative;
  left: 70%;
  transform: translate(-50%, -50%);
}

</style>