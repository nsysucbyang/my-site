#include<stdio.h>
#include<stdlib.h>
#include<string.h>

#define SIZE 256


void carry_array(int *in);
void initialize(char *in,int max_size);
void initialize_int(int *in,int max_size);
void to_mul_array(char *array1,char *array2,int *mul_array);
void subtract_zero(char *in);
/**把該數字的字串都減去ASCI的'0',輸出時要加回來**/
void add_zero(char * in);

void the_strrev(char *in);

int len1,len2;

int main(void){
    int a;
    char array1[SIZE],array2[SIZE];
    int mul_array[SIZE * 2]={0};
    /**
    FILE * in ;
    in = fopen("B013040033-雷皓博-10106.txt","r");
**/
    while( fscanf(stdin,"%s",array1)!= EOF )
    {
        initialize_int(mul_array,SIZE * 2  );
        fscanf(stdin,"%s",array2);

        len1=strlen(array1);
        len2=strlen(array2);

        the_strrev(array1);
        the_strrev(array2);
/**
        fprintf(stdout,"%s\n",array1);
        fprintf(stdout,"%s\n",array2);
        **/
        subtract_zero(array1);
        subtract_zero(array2);

/**
        fprintf(stdout,"%s\n",array1);
        fprintf(stdout,"%s\n",array2);
**/
        to_mul_array(array1,array2,mul_array);
        carry_array(mul_array);
        int i=SIZE*2 -1;
        for(; i>=0  && mul_array[i]==0 ; i--);
        for( ; i>=0  ; i--)
        {
            fprintf(stdout,"%d",mul_array[i]);
        }
        if( ( len1==1 && array1[0] == 0 ) || ( len2==1 && array2[0] == 0 ) )
        {
            fprintf(stdout,"0");
        }

        initialize(array1,SIZE );
        initialize(array2,SIZE );
        fprintf(stdout,"\n");
    }



    return 0;
}

void the_strrev(char *in)
{
    int p=0,q;
    char temp;

    for(q=0 ; in[q] != '\0' ; q++ ); /**會找到'\0'**/

    q--;/**找'\0'的前個**/

    for(  ; p<q ; p++,q--  )
    {
        temp = in[p];
        in[p] = in[q];
        in[q] = temp;
    }

    return;
}
void subtract_zero(char *in)
{
    for(int q=0 ; in[q] != '\0' ; q++ )
    {
        in[q] = in[q] - '0';
    }
    return;
}
void add_zero(char *in)
{
    for(int q=0 ; in[q] != '\0' ; q++ )
    {
        in[q] = in[q] + '0';
    }
    return;
}

void to_mul_array(char *array1,char *array2,int * mul_array)
{

/**
        fprintf(stdout,"len1 = %d\n",len1);
        fprintf(stdout,"len2 = %d\n",len2);
**/
    for(int i=0;i<len1;i++)
    {
        for(int j=0;j<len2;j++)
        {
            mul_array[i+j] += array1[i] * array2[j];

        }

    }

}
void initialize_int(int *in,int max_size)
{
    for(int i=0 ; i<max_size ; i++ )
    {
        in[i] = 0 ;

    }

}
void initialize(char *in,int max_size)
{
    for(int i=0 ; i<max_size ; i++ )
    {
        in[i] = 0 ;/**  在ASCI碼裡 '\0' == 0  **/

    }

}
void carry_array(int *in)
{
    int temp;
    for(int i=0;i<SIZE*2-2;i++)
    {
        in[i+1]+=in[i]/10;
        in[i]=in[i]%10;


    }

}

