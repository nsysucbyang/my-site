#include<stdio.h>
#include<stdlib.h>
#include<queue>

using namespace std;
struct node{
int n[4];
int step;/** store step number **/
};

int forbid[10000];

int main()
{
   // FILE *fr = fopen("B013040033-¹pµq³Õ-10067.txt","r");

    int max_case;

    fscanf(fr,"%d",&max_case);
    for(int case_num = 0;case_num < max_case;case_num++)
    {
        for(int i=0;i<10000;i++)
            forbid[i] = 0;
        int s[4],t[4];
        for(int i=0;i<4;i++)
            fscanf(fr,"%d",&s[i]);/**source**/
        for(int i=0;i<4;i++)
            fscanf(fr,"%d",&t[i]);/**target**/

        int stop_num;
        fscanf(fr,"%d",&stop_num);/**forbidden number**/
        int st[4];
        for(int i=0;i<stop_num;i++ )
        {
            for(int j=0;j<4;j++)
            fscanf(fr,"%d",&st[j]);/**stop number**/

            forbid[ st[0]*1000+st[1]*100+st[2]*10+st[3] ]=1;
        }


        queue<struct node>BFS_queue;
        int step_num=-1;/** store step number **/

        struct node current,next;

        for(int i=0;i<4;i++)
            current.n[i]=s[i];
        current.step = -1;
        BFS_queue.push(current);
        int fflag =0;
        int k=0;
        while(!BFS_queue.empty() )
        {

            current = BFS_queue.front();
            BFS_queue.pop();

            if(current.n[0]==t[0]&&current.n[1]==t[1]&&current.n[2]==t[2]&&current.n[3]==t[3])
            {
                fflag=1;
                fprintf(stdout,"%d\n", current.step + 1);
                break;
            }


            if(forbid[current.n[0]*1000+current.n[1]*100+current.n[2]*10+current.n[3] ]==0)
            {
                forbid[current.n[0]*1000+current.n[1]*100+current.n[2]*10+current.n[3] ]=1;

                int da[8]={1,-1,0,0,0,0,0,0};
                int db[8]={0,0,1,-1,0,0,0,0};
                int dc[8]={0,0,0,0,1,-1,0,0};
                int dd[8]={0,0,0,0,0,0,1,-1};

                for(int i=0;i<8;i++)
                {
                    next.n[0] = (current.n[0] + da[i] +10)%10;
                    next.n[1] = (current.n[1] + db[i] +10)%10;
                    next.n[2] = (current.n[2] + dc[i] +10)%10;
                    next.n[3] = (current.n[3] + dd[i] +10)%10;
                    next.step=current.step+1;

                    if(forbid[next.n[0]*1000+next.n[1]*100+next.n[2]*10+next.n[3] ]==0)
                    BFS_queue.push(next);

                }
            }
        }
        if(fflag == 0)
            fprintf(stdout,"-1\n");
    }

    return 0;
}
