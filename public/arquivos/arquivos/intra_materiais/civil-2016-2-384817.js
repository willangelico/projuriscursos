{
  "hosting": {
    "public": "dist",
    "headers": [ {
	  "source" : "/**/**/*.@(jpg|jpeg|gif|png)",
	  "headers" : [ {
	    "key" : "Cache-Control",
        "value" : "max-age=604800"
	  } ]
	} ]
  }
}