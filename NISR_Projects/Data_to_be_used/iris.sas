* Written by R;
*  write.foreign(iris, "./data/iris.sas7bdat", "./data/iris.sas",  ;

PROC FORMAT;
value Species 
     1 = "setosa" 
     2 = "versicolor" 
     3 = "virginica" 
;

DATA  rdata ;
INFILE  "./data/iris.sas7bdat" 
     DSD 
     LRECL= 21 ;
INPUT
 Sepal_Length
 Sepal_Width
 Petal_Length
 Petal_Width
 Species
;
LABEL  Sepal_Length = "Sepal.Length" ;
LABEL  Sepal_Width = "Sepal.Width" ;
LABEL  Petal_Length = "Petal.Length" ;
LABEL  Petal_Width = "Petal.Width" ;
FORMAT Species Species. ;
RUN;
