#include <stdio.h>
#include <memory.h>
#define N 300

int main() {
    long long f[N + 1][N + 1];
    memset(f, 0, sizeof(f));
    for (int j = 0; j <= N; j++) {
        f[0][j] = 1;
    }
    for (int i = 1; i <= N; i++) {
        for (int j = 1; j <= N; j++) {
            f[i][j] = f[i][j - 1];
            if (i - j >= 0) {
                f[i][j] += f[i - j][j];
            }
        }
    }
    
    
    char s[50];
    while (gets(s)) {
        int n, l1, l2;
        int cnt = sscanf(s, "%d%d%d", &n, &l1, &l2);
        if (l1 > 300) {
            l1 = 300;
        }
        if (l2 > 300) {
            l2 = 300;
        }
        long long ans = 0;
        switch (cnt) {
            case 1 :
                ans = f[n][n];
                break;
            case 2 :
                ans = f[n][l1];
                break;
            case 3 :
                if (n == 0 && l1 == 0) {
                    ans = 1;
                    break;
                }
                if (l1 == 0) {
                    l1 = 1;
                }
                ans = f[n][l2] - f[n][l1 - 1];
                break;
        }
        printf("%lld\n", ans);
    }
}