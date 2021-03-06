%{
#include<stdio.h>
#include<string.h>
#include<math.h>
#include<stdlib.h>
#include "cali.tab.h"
int yywrap(void);
%}

%%

\<p[ ]*class\=\"text\-\justify\"\>[ \t\n]*\<span[ ]*class\=\"glyphicon[ ]*glyphicon\-circle\-arrow\-right\"\>\<\/span\>[ \t\n]* { yylval.sval = strdup(yytext); return RESEARCHSTMT;}




\<div[ ]*class=\"tab\-pane\"[ ]*id=\"resp-tab2\"\>[ \t\n]*\<p\>\<span[ ]*class=\"glyphicon[ ]*glyphicon\-circle\-arrow\-right\"\>\<\/span\>[a-zA-Z0-9\.\'\;\:\?\/\<\>\,\"\(\)\-\= \t\n]*?\<\/div\> {yylval.sval = strdup(yytext);  return PUBLICATION;} 

\<div[ ]*class\=\"tab\-pane\"[ ]*id\=\"resp\-tab3\"\>([a-zA-Z0-9\;\&\<\>\=\"\-\/\:\,\.\(\)\#\+\!\n\t\& ]+?)(\<\/div\>) {yylval.sval = strdup(yytext); return CURRENTPROJ;} 



\<div[ ]*class\=\"tab\-pane\"[ ]*id\=\"resp\-tab4\"\>([a-zA-Z0-9\;\&\<\>\=\"\-\/\:\,\.\(\)\#\+\!\n\t\& ]+?)(\<\/div\>) {yylval.sval = strdup(yytext); return GROUPMEM;} 


\<div[ ]*style\=\"height\:[ ]*0px\;\"[ ]*id\=\"collapseseven\"[ ]*class\=\"accordion\-body[ ]*collapse\"\>[ \t\n]*\<div[ ]*class\=\"accordion\-inner\"\>[ \t\n]*\<ul\>[\<li\>[a-zA-Z0-9\;\&\<\>\=\"\-\/\:\,\.\(\)\#\+\!\n\t\& ]+\<\/li\>]*  { yylval.sval = strdup(yytext); return AwardsAndAccolades; }



\<a[ ]*target\=\"\_blank\"[ ]*href\=\"http\:\/\/cse\.iitkgp\.ac\.in\/\~[ a-zA-Z]*\/\"\> {
    yytext[strlen(yytext) - 2] = '\0'; yylval.sval = strdup(yytext+25); return WEBSITESTART; }




[ \t\n\r\s] ;
\&nbsp ;
\<[^>]* ;


\<\/h3\> {yylval.sval = strdup("END");return END;}
\<\/span\> {yylval.sval = strdup("END");return END;}
\<\/li\> {yylval.sval = strdup("END");return END;}
\<\/ul\> {yylval.sval = strdup("END");return END;}
\<\/div\> {yylval.sval = strdup("END");return END;}
\<\/p\> {yylval.sval = strdup("END");return END;}

\<h3[ ]*style\=\"color\:\#ff0\;[ ]*font-weight\:[ ]*bold\;\"\> {yylval.sval = strdup("NAME");return NAME;} 

\<p[ ]*style\=\"font-weight\:[ ]*bold\;\"\>[ \t\n]*\<span\> {yylval.sval = strdup("DESIGNATION");return DESIGNATION;}

\<li\>\<i[ ]*class\=\"fa[ ]*fa\-phone\"\>\<\/i\>[ \t\n]*\&nbsp\; {yylval.sval = strdup("CONTACT");return CONTACT;} 

\<li\>\<i[ ]*class\=\"fa[ ]*fa\-envelope\"\>\<\/i\>[ \t\n]*\&nbsp\; {yylval.sval = strdup("EMAIL");return EMAIL;} 

\<div[ ]*id\=\"collapseOne\"[ ]*class\=\"accordion\-body[ ]*collapse[ ]*in\"[ ]*aria\-expanded\=\"true\"\>[ \t\n]*\<div[ ]*class\=\"accordion\-inner\"\>[ \t\n]*\<ul\> { yylval.sval = strdup("RESPLIST"); return RESPLIST;}
                                                                    
                                                                        
[a-zA-Z0-9\.\+\-\@\(\)\&\:\,\/ \’\~\"\; ]+ {yylval.sval = strdup(yytext);return STRING;}

. ;


%%
int yywrap(){
      printf("End of parsing \n");
}
void yyerror(const char *str)
{
      printf("Invalid Character...");
}
int main()
{
    yyparse();
    return(0);
}
