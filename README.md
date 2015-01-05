#API Document Spec
***********
{:toc}
***********
##Update History

| Prepared By   |      Date       |         Description         |
|---------------|-----------------|-----------------------------|
| Susan Hsieh   |2014/12/30       |	Get Device list             |
| Susan Hsieh   |2014/12/31       | POST Device                 |

***********
##APIs
### 1.GET Devices
List devices that match certain criteria
>
```
GET /devices
```

####Parameters

| Parameter          |Value         |Description                      |Type   |
|--------------------|--------------|---------------------------------|-------|
|includeDeleted      |false(default)|Include delete                   |boolean|
|includeSpecification|false(default)|Include specification information|boolean|
|includeAssignment   |false(default)|Include assignment if associated |boolean|
|page                |1             |Page Number (First page is 1)    |integer|
|pageSize            |100           |Page size                        |integer|

Parameter content type:`query`

####Response
```
{
  "results": [
    {
      "specificationToken": "",
      "hardwareId": "",
      "parentHardwareId": "",
      "deviceElementMappings": [
        {
          "hardwareId": "",
          "deviceElementSchemaPath": ""
        }
      ],
      "comments": "",
      "assignmentToken": "",
      "status": "",
      "metadata": "object",
      "createdBy": "",
      "createdDate": "date-time",
      "updatedDate": "date-time",
      "updatedBy": "",
      "deleted": false
    }
  ],
  "numResults": 0
} 
```
####Response Messages
|HTTP Status Code|Reason      |
|----------------|------------|
|200             |OK          |
|403             |Forbidden   |
|401             |Unauthorized|
|404             |Not Found   |

### 2.POST Devices
Create a new device
>
```
POST /devices
```
####Parameters
```
{
  "hardwareId": "",
  "comments": "",
  "specificationToken": "",
  "parentHardwareId": "",
  "removeParentHardwareId": false,
  "deviceElementMappings": [
    {
      "device": {
        "specificationToken": "",
        "hardwareId": "",
        "parentHardwareId": "",
        "deviceElementMappings": [
          {
            "hardwareId": "",
            "deviceElementSchemaPath": ""
          }
        ],
        "comments": "",
        "assignmentToken": "",
        "status": "",
        "metadata": "object",
        "createdBy": "",
        "createdDate": "date-time",
        "updatedDate": "date-time",
        "updatedBy": "",
        "deleted": false
      },
      "hardwareId": "",
      "deviceElementSchemaPath": ""
    }
  ],
  "status": "",
  "metadata": "object"
}
```
Parameter content type:`applicaion/json`
####Response
```
{
  "specificationToken": "",
  "hardwareId": "",
  "parentHardwareId": "",
  "deviceElementMappings": [
    {
      "hardwareId": "",
      "deviceElementSchemaPath": ""
    }
  ],
  "comments": "",
  "assignmentToken": "",
  "status": "",
  "metadata": "object",
  "createdBy": "",
  "createdDate": "date-time",
  "updatedDate": "date-time",
  "updatedBy": "",
  "deleted": false
}
```

####Response Messages
|HTTP Status Code|Reason      |
|----------------|------------|
|201             |Created     |
|200             |OK          |
|403             |Forbidden   |
|401             |Unauthorized|
|404             |Not Found   |

##Status Codes(Appendix)
All status codes are standard HTTP status codes. The below ones are used in this API.

<font color="green">2XX</font>- Success of some kind<br /> 
<font color="red">4XX</font>- Error occurred in client's part<br /> 
<font color="red">5XX</font>- Error occurred in server's part<br /> 

|Status Code                  |Description                                          |
|-----------------------------|-----------------------------------------------------|
|<font color="green">200<font>|OK                                                   |
|<font color="green">201<font>|Created                                              |
|<font color="green">202<font>|Accepted (Request accepted, and queued for execution)|
|<font color="red">400<font>  |Bad request                                          |
|<font color="red">401<font>  |Authentication failure                               |
|<font color="red">403<font>  |Forbidden                                            |
|<font color="red">404<font>  |Resource not found                                   |
|<font color="red">405<font>  |Method Not Allowed                                   |
|<font color="red">409<font>  |Conflict                                             |
|<font color="red">412<font>  |Precondition Failed                                  |
|<font color="red">413<font>  |Request Entity Too Large                             |
|<font color="red">500<font>  |Internal Server Error                                |
|<font color="red">501<font>  |Not Implemented                                      |
|<font color="red">503<font>  |Service Unavailable                                  |

