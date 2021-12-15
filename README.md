* Casadar Add Product API Endpoint: https://www.casadar.com/en/api/product/addProduct
* Notes :
* Mandatory input to use API in headers : Api key in X-API-KEY header.
* Product Weight must be in KG. Product Length, Width, Height must be in CM. 

# Request Method: POST via json data
```json
{
    "CasadarEmail":"abc@example.com", //casadar registered pro user email here,
    "CasadarPassword":"123H88H##hJ7uy", //casadar registered pro user password here,
    "ProductSKU":"VendorProd002",
    "ProductName_en":"Example Product",
    "SalePrice":"9",
    "ProductPrice":"10",
    "ProductStock":"100",
    "ProductLength":"10",
    "ProductWidth":"20",
    "ProductHeight":"30",
    "ProductWeight":"33",
    "ImageStorageUrl":"https://www.example.com/uploads",
    "ImageName":{
        "0":"exampleImage01.jpg",
        "1":"exampleImage02.jpg"
    },
    "ProductShortDesc":"This is an example product"
}
```
 Fields/Parameters Validations:
* CasadarEmail=>'Required|Valid Email', //casadar registered pro user email here,
* CasadarPassword=>'Required', //casadar registered pro user password here,
* ProductName_en => 'Required'
* SalePrice => 'Required|numeric'
* ProductPrice => 'Required|numeric'
* ProductStock => 'Required|numeric',
* ProductLength => 'Required|numeric'
* ProductWidth => 'Required|numeric'
* ProductHeight => 'Required|numeric'
* ProductWeight => 'Required|numeric'
* ImageStorageUrl => 'Required|Valid Url'
* ImageName => 'Required'
* ProductShortDesc => 'Required'

* ProductName_ar => 'optional'
* ProductCartDesc => 'optional'
* productCartDescAR => 'optional'
* ProductShortDesc => 'optional'
* productshortDescAR => 'optional'
* ProductLongDesc => 'optional'
* productLongDescAR => 'optional'
