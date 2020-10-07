package TroChoi15so;

public class State {
	State cha;
	Operator me;
	int d[][];

	public State(int d[][]) {
		this.d = new int[4][4];
		for (int i = 0; i < 4; i++)
			for (int j = 0; j < 4; j++) {
				this.d[i][j] = d[i][j];
			}
	}

	public State() {
		d = new int[4][4];
		for (int i = 0; i < 4; i++)
			for (int j = 0; j < 4; j++) {
				d[i][j] = (i * 4 + j + 1) % 16;
			}
	}

	public void print() {
		for (int i = 0; i < 4; i++) {
			for (int j = 0; j < 4; j++) {
				System.out.print("\t"+d[i][j]);
			}
			System.out.println();
		}
		System.out.println("-----------------------------------------------");
	}

	String getKey() {
		String s = "";
		for (int i = 0; i < 4; i++)
			for (int j = 0; j < 4; j++) {
				switch (d[i][j]) {
				case 10:
					s += "A";
				case 11:
					s += "B";
				case 12:
					s += "C";
				case 13:
					s += "D";
				case 14:
					s += "E";
				case 15:
					s += "F";
				default:
					s += d[i][j];
				}
			}
		return s;
	}
}
