
#include<stdio.h>
#include<stdlib.h>
#include<algorithm>
#include<vector>

struct node{
int value;
node *lptr;
node *rptr;
};
node Tree[12][2050];
int N,M;/**N is 2^k ,k=1,2,3,...,10 **/

bool fuck_flag;
void rec_printf(node * ptr)
{
        if( (*ptr).lptr==NULL && (*ptr).rptr==NULL  )
        {
            if(fuck_flag) printf(" ");
            fuck_flag=true;
            printf("%d",(*ptr).value );
            return;
        }

        rec_printf((*ptr).lptr);
        rec_printf((*ptr).rptr);
}

int main(){

        while(scanf("%d",&N)){
                if(N==0)
                    break;
                M=2*N-1;

                for(int i=0;i<M;i++)
                {
                        scanf("%d",&Tree[0][i].value);
                        Tree[0][i].lptr=Tree[0][i].rptr=NULL;
                }

                int depth=0;
                for(int i=1;i<N;i=i*2) depth++;


                //printf("%d",depth);
                int temp_m=M;
                int t=0,k=0;
                for(t=0;t<depth;t++)
                {

                        //printf("\n------t=%d-----\n",t);
                        int odd_num=0,even_num=0;
                        node* odd[2048];
                        node* even[2048];
                        for(int i=0;i<temp_m;i++)
                        {
                            //printf("%d ",Tree[t][i].value );
                            if(Tree[t][i].value%2)
                                odd[odd_num++]=&Tree[t][i];
                            else
                                even[even_num++]=&Tree[t][i];
                        }
                        if(odd_num%2)
                            odd_num--;
                        else
                            even_num--;


                        temp_m = (temp_m-1)/2;
                        k=0;
                        for(int i=0;i<odd_num;i+=2,k++)
                        {

                            Tree[t+1][k].lptr=odd[i];
                            Tree[t+1][k].rptr=odd[i+1];
                            Tree[t+1][k].value= ((*odd[i]).value+(*odd[i+1]).value)/2;
                            //printf("\n%d ",Tree[t+1][k].value );
                        }
                        for(int i=0;i<even_num;i+=2,k++)
                        {

                            Tree[t+1][k].lptr=even[i];
                            Tree[t+1][k].rptr=even[i+1];
                            Tree[t+1][k].value= ((*even[i]).value+(*even[i+1]).value)/2;
                            //printf("\n%d ",Tree[t+1][k].value );
                        }

                }/**end of for**/
                //printf("\n\n%d ",Tree[t][k-1].value );
                //printf("\n-----------\n",t);
                fuck_flag=false;
                printf("Yes\n");
                rec_printf(&Tree[t][k-1]);
                 printf("\n");
                //printf("\n-----------\n",t);




        }


return 0;
}
