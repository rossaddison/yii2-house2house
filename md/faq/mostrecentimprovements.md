**June 2020**
A dashboard has been introduced by means of views/site/index.php which uses frontend/components/Utilities.php to provide the following functions:
    1. The last customer to **signup.**
    1. Cleans that are **due** for today.
    1. All streets that fall under the specific postcode reflected on a Google Map. Each street has a schedule of houses with the relevant prices charged per house. 
       These schedules are viewable by means of dashboard **Postcode Maps** provided the two longitude and latitude coordinates are input 
       for the street. Type site/index in the browser and click on the Postcode Maps tab.
    1. A **customer search.**
    1. **Postcode Finder** using a popular finder.
    1. **Tree** - Kartik's tree manager is being used now to reflect all houses in specific streets in specific postcodes. The tree is built using 
    the default database structure provided with the extension. In addition 3 foreign keys have been introduced to provide url links to the respective 
    ID of the **table works_krajee_product_tree.** To get this benefit you will have to do a migration. The relevant file lies under frontend/migrations. 
    So if you click on a postcode in the tree, the link to that specific postcode will be provided. This will occur similarly for streets, and houses.
    
  
