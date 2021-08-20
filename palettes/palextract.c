#include <unistd.h>
#include <stdio.h>
#include <fcntl.h>

int main(int argc, char **argv)
{
	int x = atoi (argv[4]);
	int y = atoi (argv[5]);
	int w = atoi (argv[2]);
	int h = atoi (argv[3]);
	int fd = open (argv[1], O_RDONLY);

	int lx, ly;

	if (w % x || h % y)
	{
		fprintf (stderr, "Warning: Size not evenly divisible by count\n");
	}

	for (ly = 0; ly < y; ly++)
	{
		int pixy = (h / y) / 2 + ly * h / y;
		for (lx = 0; lx < x; lx++)
		{
			unsigned char bytes[3];
			int pixx = (w / x) / 2 + lx * w / x;
			int spot = (pixy * w + pixx) * 3;
			lseek (fd, spot, SEEK_SET);
			read (fd, &bytes, 3);
			printf ("%02x%02x%02x %dx%d %d\n", bytes[0], bytes[1], bytes[2], lx, ly, spot);
		}
	}
}
