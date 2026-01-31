#include <stdio.h>
#include <string.h>

double pow(int x, int y) {
    double rst = 1;
    for (int i = 0; i < y; i++) {
        rst *= x;
    }
    return rst;
}

int main() {
    int n, k;
    while (scanf("%d%d", &k, &n) == 2) {
        double f[101][10];
        memset(f, 0, sizeof(f));
        for (int i = 0; i <= k; i++) {
            f[1][i] = 1;
        }
        for (int i = 2; i <= n; i++) {
            f[i][0] = f[i - 1][0] + f[i - 1][1];
            for (int j = 1; j < k; j++) {
                f[i][j] = f[i - 1][j - 1] + f[i - 1][j] + f[i - 1][j + 1];
            }
            f[i][k] = f[i - 1][k - 1] + f[i - 1][k];
        }
        double ans = 0;
        for (int i = 0; i <= k; i++) {
            ans += f[n][i];
        }
        printf("%.5f\n", ans * 100 / pow(k + 1, n));
    }
    return 0;
}