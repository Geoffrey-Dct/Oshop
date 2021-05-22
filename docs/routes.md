# Routes

## Sprint 1

| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
| `/` | `GET` | `MainController` | `home` | Dans les shoe | 5 categories | - |
| `/mentions-légales/` | `GET` | `MainController` | `legal-notice` | Mentions légales | The notice... | - |
|`/catalogue/categorie/[i:id]`|`GET`|`CatalogController`|`category`|Nom de la catégorie|The products|-|
|`catalogue/type/[i:id]`|`GET`|`CatalogController`|`type`|Nom du type|The products|-|
|`catalogue/produit/[i:id]`|`GET`|`CatalogController`|`product`|Nom du produit|The product|-|