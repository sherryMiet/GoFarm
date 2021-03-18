using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class stock_control : MonoBehaviour {
    public stock_up limit;
    public int chick_total;
    public int ox_total;
    public int pig_total;
    public int chick_stock = 0;
    public int pig_stock = 0;
    public int ox_stock = 0;
    public int max;
    public Text show_chick;
    public Text show_pig;
    public Text show_ox;
    public Text total_chick;
    public Text total_pig;
    public Text total_ox;
    public GameObject downchick;
    public GameObject downpig;
    public GameObject downox;

    IEnumerator ShowAniTotal()
    {
        WWWForm form = new WWWForm();//上傳unity使用者所輸入的資料
        form.AddField("userid", Savedata.id);

        WWW www = new WWW("http://163.17.135.213/accounting/ConToShowTotal.php", form);
        yield return www;
        string b;
        b = www.text;
        b = b.Replace(" ", "");
        b = b.Replace("\r", "");
        b = b.Replace("\n", "");
        b = b.Replace("\t", "");
        b = b.Replace("</br>", "");
        print("system message:"+b);
        string[] animal = b.Split(',');
        int i = 0;
        for (i = 0; i < 3; i++)
        {
            print(animal[i] + " ");
        }
        chick_total = int.Parse(animal[0]);
        pig_total = int.Parse(animal[1]);
        ox_total = int.Parse(animal[2]);

        
    }
    // Use this for initialization
    void Start () {
       
        StartCoroutine(ShowAniTotal());
       
        if (pig_total == 0 || pig_total < 0)
        {
            downpig.SetActive(false);
        }
        else
        {
            downpig.SetActive(true);
        }
        if (ox_total == 0 || ox_total < 0)
        {
            downox.SetActive(false);
        }
        else
        {
            downox.SetActive(true);
        }
    }
	
	// Update is called once per frame
	void Update () {
        if (chick_total == 0 || chick_total < 0)
        {
            downchick.SetActive(false);
        }
        else {
            downchick.SetActive(true);
        }
        if (pig_total == 0 || pig_total<0)
        {
            downpig.SetActive(false);
        }
        else {
            downpig.SetActive(true);
        }
        if (ox_total == 0 || ox_total < 0)
        {
            downox.SetActive(false);
        }
        else {
            downox.SetActive(true);
        }
        if (chick_stock<0)
        {
            chick_stock = 0;
        }
        if (pig_stock < 0)
        {
           pig_stock = 0;
        }
        if (ox_stock < 0)
        {
            ox_stock = 0;
        }
        max = chick_stock + pig_stock + ox_stock;
        
        show_chick.text = "" + chick_stock;
        Savedata.chick_stock = chick_stock;
        show_pig.text = "" + pig_stock;
        Savedata.pig_stock = pig_stock;
        show_ox.text = "" + ox_stock;
        Savedata.ox_stock = ox_stock;
        total_chick.text = "" + chick_total;
        total_pig.text = "" + pig_total;
        total_ox.text = "" + ox_total;
    }
}
